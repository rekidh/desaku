const _token = document.querySelector('meta[name="csrf-token"]').content;
// ###########FUNC FETCH DATA###########
// TABLE DISPLAY
  const dataTable = async (url_param)=> { 
    const url = url_param? url_param:'http://127.0.0.1:8000/api/api_warga';
     await fetch(url).then((res)=>{
      if(res.status==200){
        return  res.json()
      }
      swal(" Upss! Terjadi Kesalahan!", {
            icon: "warning",
            buttons: false,
            timer: 3000
          });
    }) //gunakan ENV
     .then((res)=>{ 
       let temp="";
        res.data.data.forEach((index)=>{  
        temp +=
        `<tr >
          <td>${index.nama}</td>
          <td>${index.kk}</td>
          <td>${index.nik}</td>
          <td>${index.tanggal_lahir}</td>
          <td>${index.status}</td>
          <td>${index.jenis_kelamin}</td>
          <td>
            <div class="row">
             <button type="button" name="edit" value="${index.id}" class="col-5 btn_edit btn-xs btn bg-warning "><i class="fas fa-pen"></i></button>
              <button type="button" name="delete" value="${index.id}" class="col-5 btn_delete btn-xs btn mx-1 bg-gradient-danger"><i class="fas fa-trash-alt"></i></button>
            </div>
          </td>
          </tr>` 
        });
        document.querySelector("#tbody").innerHTML=temp;   
          
        document.querySelector('[name="table_info"]').innerText=`Halaman ${res.data.current_page} dari ${res.data.last_page} total data ${res.data.total} ` ;
        
        let page_temp='';
        res.data.links.forEach((index)=>{
        page_temp +=`<li class="paginate_button page-item ${index.active?"active":""} "> <a aria-controls="example ${index.label}" data-dt-idx="${index.label}" tabindex="${index.label}" class="page-link">${index.label}</a></li>`
      });

        document.querySelector('[name="pages_link"]').innerHTML=page_temp;

        return res.data.links;

    }).then((res)=>{
      document.querySelectorAll('[name=edit]').forEach((index,key)=>{
        const id =index.value;
        index.onclick= ()=> edit(id);
        document.querySelectorAll('.btn_delete')[key].onclick=()=>delate(id)
      });
      document.querySelectorAll('.page-link').forEach((index,key)=>{
        index.onclick=()=>dataTable(res[key].url)
      })   

    })
    
  } //closing tag function dataTable
  
  // ###########FUNC ONLOAD###########
  
  window.addEventListener("onLoad",dataTable());

  // ##################REFRESH#########################
  document.getElementById("button-refresh").addEventListener("click",(e)=>{
      document.querySelector('[name="uid"]').removeAttribute("value")
      document.querySelector('[name="no_kk"]').value="";
      document.querySelector('[name="no_nik"]').value="";
      document.querySelector('[name="nama"]').value="";
      document.querySelector('[name="tgl_lahir"]').value="";
      document.querySelector('[name="status"]').value="Pilih";
       swal("Berhasil! create", {
            // icon: "info",
            buttons: false,
            timer: 200
          })
  })
  
// ###########FUNCTION CREATE DATA###########
document.querySelector("#button-sub").addEventListener("click",async function(e){
  e.preventDefault() ;
      const uid = document.querySelector('[name="uid"]');
      const kk = document.querySelector('[name="no_kk"]');
      const nik = document.querySelector('[name="no_nik"]');
      const nama = document.querySelector('[name="nama"]');
      const gender = document.querySelector('[name="radio"]:checked');
      const tgl_lahir = document.querySelector('[name="tgl_lahir"]');
      const status = document.querySelector('[name="status"]');
      console.log(status.value)
      const data={
        "id":uid.value,
        "kk":kk.value,
        "nik":nik.value,
        "nama":nama.value,
        "gender":gender.value,
        "tgl_lahir":tgl_lahir.value,
        "status":status.value,
        "_token": _token        
      };
      await fetch('http://127.0.0.1:8000/api/api_warga/create',{
        method:'POST',
        headers: {
          'Accept' : 'application/json, text/plaint ,*/*',
          'Access-Control-Allow-Origin': '*',
          'Content-Type': 'application/json',
          'Connection': 'Keep-Alive',
          'x-csrf-token':data._token
        },
        body:JSON.stringify(data)
      }).then((res)=>{
        if(res.status==200){
            swal("Berhasil! create", {
            icon: "success",
            buttons: false,
            timer: 1000
          });
        uid.removeAttribute("value")
        kk.value=""
        nik.value=""
        nama.value=""
        tgl_lahir.value=""
        status.value="Pilih"
        }
        
        //ERROR walau status 200
        // swal("Upss!! Terjadi Kesalahan!", {
        //     icon: "warning",
        //     buttons: false,
        //     timer: 3000
        //   });
      }).then(()=>dataTable());
  });
    
    
// ###########FUNCTION SEARCH###########
document.querySelector('[name="search_input"]').addEventListener("input",async function (e){
  const value = e.target.value;

  await fetch(`http://127.0.0.1:8000/api/api_warga?search=${value}`)
  .then((res)=>{
    if(res.status==200){
      return  res.json()
    }
    swal("Upss!! Terjadi Kesalahan!", {
      icon: "warning",
      buttons: false,
      timer: 3000
    });
  })
  .then((res)=>{
    let temp="";
    if(res.data.data==0){ 
    temp=
        `<tr>
        <td>kosong</td>
        <td>kosong</td>
        <td>kosong</td>
        <td>kosong</td>
        <td>kosong</td>
        <td>kosong</td>
        <td>kosong</td>
        </tr>` 
     }else{
      res.data.data.forEach((index) =>{  
       temp +=
       ` <tr>
          <td>${index.nama}</td>
          <td>${index.kk}</td>
          <td>${index.nik}</td>
          <td>${index.tanggal_lahir}</td>
          <td>${index.status}</td>
          <td>${index.jenis_kelamin}</td>
          <td>
            <div class="row">
              <button type="button" name="edit" value="${index.id}" class="col-5 btn_edit btn-xs btn bg-warning "><i class="fas fa-pen"></i></button>
              <button type="button" name="delete" value="${index.id}" class="col-5 btn-xs btn mx-1 bg-gradient-danger"><i class="fas fa-trash-alt"></i></button>              
            </div>
            </td>
        </tr>` 
      });
    }
      let page_temp='';
        res.data.links.forEach((index)=>{
        page_temp +=`<li class="paginate_button page-item ${index.active?"active":""} "> <a aria-controls="example ${index.label}" data-dt-idx="${index.label}" tabindex="${index.label}" class="page-link">${index.label}</a></li>`
        });
    document.querySelector('[name="pages_link"]').innerHTML=page_temp;
    document.querySelector("#tbody").innerHTML=temp;

    return [res.data.links,res.data.data]
  }).then( 
    ([links,data])=>{
      if(data.length>0){ 
        document.querySelectorAll('[name=edit]').forEach((index,key)=>{ 
          index.onclick= ()=> edit(index.value);  
          document.querySelectorAll('[name=delete]')[key].onclick=()=>delate(index.value)
      })
      document.querySelectorAll('.page-link').forEach((index,key)=>{
        index.onclick=()=>dataTable(links[key].url)
      })
    }
  })

}) //closing tag event search

// ###########FUNC###########
const edit = async (id)=>{
  await fetch(`http://127.0.0.1:8000/api/api_warga/getDataById/${id}`)
  .then((res)=>{ 
  if(res.status==200){
    return res.json()
  }
   swal("Upss!! Terjadi Kesalahan!", {
    icon: "warning",
    buttons: false,
    timer: 3000
  });
}).then((res)=>{

    //Code here
      let i = res.data.jenis_kelamin=='L'?0:1
      document.querySelector('[name="uid"]').value=res.data.id;
      document.querySelector('[name="no_kk"]').value=res.data.kk
      document.querySelector('[name="no_nik"]').value=res.data.nik
      document.querySelector('[name="nama"]').value=res.data.nama
      document.querySelectorAll('[name="radio"]')[i].checked=true
      document.querySelector('[name="tgl_lahir"]').value=res.data.tanggal_lahir
      document.querySelector('[name="status"]').value=res.data.status
      smoothscroll()
  })

}
function smoothscroll(){
    const currentScroll = document.documentElement.scrollTop || document.body.scrollTop;
    if (currentScroll > 0) {
         window.requestAnimationFrame(smoothscroll);
         window.scrollTo (0,currentScroll - (currentScroll/5));
    }
}
// ###########FUNC###########
const delate= async (id)=>{
 await fetch(`http://127.0.0.1:8000/api/api_warga/getDataById/${id}`)
  .then((res)=>{ 
  if(res.status==200){
    return res.json()
  }

   swal("Upss!! Terjadi Kesalahan!", {
    icon: "warning",
    buttons: false,
    timer: 3000
  });
}).then((res)=>{  
    swal({
    title: "Anda Yakin ?",
    text: `Akan menghapus  ${res.data.nama}`,
    icon: "warning",
    buttons: true,
    dangerMode: true,
    }).then(async (comfirm)=>{ //deleted execute
        if(comfirm){
          await fetch(`http://127.0.0.1:8000/api/api_warga/delete/${id}`).then((res)=>res.json())
            .then((res)=>{
              if(res.code==200){
                console.log(res.code)
                swal("Penghapusan Berhasil!", {
                icon: "success",
                buttons: false,
                timer: 1000
                })
              dataTable()
              return
              }
                 swal("Upss!! Terjadi Kesalahan!", {
                  icon: "warning",
                  buttons: false,
                  timer: 5000
                });
          })
        }
      }) //close deleted execute
  })
}// closing func delete