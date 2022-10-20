**Croper Js**

-   croper adalah sebuah tools untuk mepotong sebuah object dari foto dan nilai nya adalah sebuah canvas
-   canvas ini tidak bisa langsung di save ke data base atau server sebagai file image
-   namun masi berbentuk tulisan acak yang di namakan `base64`
-   pada prosedur nya base64 ini akan di kirim ke server
-   di sini saya memasuka nilai base64 nya ke dalam sebuah inputan yang kan di isi langsung oleh JS
-   setelah data inputan base64 ini di terima di server kitan akan `mendecode`nya menjadi image baru kita lempar dia ke file public atau storage

# implementasi

-   for informasion base64 : https://youtu.be/tWkWWIlgcyU
-   getting canvas element `crop.getCroppedCanvas({options}).toDataURL("image/png")`
-   inset canvas ke form input `input.value=canvasBase64`
-   backend proses untuk memcah dan membagi nilai nya

```
// Base 64
$image_parts = explode(";base64,", $req->get('base64-image'));
$image_type_aux = explode("image/", $image_parts[0]);
$image_type = $image_type_aux[1];
// decode image
$image_base64 = base64_decode($image_parts[1]);
```

-   backend proses unutuk meletakan nilai image yang sudah jadi ke folder tujuaan

```
$folderPath = public_path('storage/images/');
$imageFullPath = $folderPath . $imageName;
// $req->image->move(public_path('storage/images'), $imageName);
file_put_contents($imageFullPath, $image_base64);
```

##POSTGRESQL SETTING

-   jika kamuu menggunakan postgre untuk database nya kamu harus mengaktifkan extention pgsql di axmmp nya
