<?php
date_default_timezone_set('Asia/Jakarta');
$db = mysqli_connect("localhost", "root", "", "ensiqtest");
function query($q)
{
    global $db;
    $result = mysqli_query($db, $q);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function upload(){
    $nama =$_FILES["link_gambar"]["name"];
    $size = $_FILES["link_gambar"]["size"];
    $error = $_FILES["link_gambar"]["error"];
    $tempfile = $_FILES["link_gambar"]["tmp_name"];
    // cek apakah ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
        alert('Pilih gambar terlebih dahulu!');
        </script>";
        return false;
    }

    // hanya gambar yang boleh di upload
    $ektensiValid = ['jpg','jpeg','png','gif'];
    $ekstensiGambar = explode('.',$nama);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if(!in_array($ekstensiGambar,$ektensiValid)){
        echo "<script>
        alert('yang Anda upload bukan gambar!');
        </script>";
        return false;
    }
    
    // cek jika ukurannya terlalu besar

    if($size > 100000000){
        echo "<script>
        alert('ukuran gambar terlalu besar!');
        </script>";
        return false;

    }
    //generate nama gambar baru
    $namaBaru = uniqid();
    $namaBaru .= '.';
    $namaBaru .= $ekstensiGambar;
    // gambar siap di upload
    move_uploaded_file($tempfile,'Gambar/' . $namaBaru);

    return $namaBaru;

}
function tambah($data){
    //ambil data
    global $db;
    $jenis_id = htmlspecialchars($data["jenis_id"]);
    $judul = htmlspecialchars($data["judul"]);
    $nama_latin = htmlspecialchars($data["nama_latin"]);
    $daerah_asal = htmlspecialchars($data["daerah_asal"]);
    $ciri_ciri = htmlspecialchars($data["ciri_ciri"]);
    $deskipsi = htmlspecialchars($data["deskipsi_singkat"]);
    // $link_gambar = htmlspecialchars($data["link_gambar"]);

    //upload gambar
    $link_gambar = upload();
    if(!$link_gambar){
        return false;
    }

    $query = "INSERT INTO entry VALUES 
    ('','$jenis_id','$judul','$nama_latin','$daerah_asal','$ciri_ciri','$deskipsi','$link_gambar')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function hapus($id){
    global $db;
    mysqli_query($db,"DELETE from entry WHERE entry_id = $id");
    return mysqli_affected_rows($db);
}


function ubah($data){
    global $db;
    $entry_id= $data["entry_id"];
    $jenis_id = htmlspecialchars($data["jenis_id"]);
    $judul = htmlspecialchars($data["judul"]);
    $nama_latin = htmlspecialchars($data["nama_latin"]);
    $daerah_asal = htmlspecialchars($data["daerah_asal"]);
    $ciri_ciri = htmlspecialchars($data["ciri_ciri"]);
    $deskipsi = htmlspecialchars($data["deskipsi_singkat"]);

    // gambar yang lama
    $link_gambar_lama = htmlspecialchars($data["link_gambar_lama"]);

    // cek apakah user pilih gambar baru atau tidak
    if($_FILES["link_gambar"]['error'] === 4) {
        $link_gambar = $link_gambar_lama;
    } else {
        $link_gambar = upload(); 
    }
     


    $query = "UPDATE entry SET 
    jenis_id = $jenis_id,
    judul = '$judul',
    nama_latin = '$nama_latin',
    daerah_asal = '$daerah_asal',
    ciri_ciri = '$ciri_ciri',
    deskipsi_singkat = '$deskipsi',
    link_gambar = '$link_gambar'
    WHERE entry_id = $entry_id";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function cari($keyword){
    $q = "SELECT * FROM entry WHERE 
    judul LIKE '%$keyword%'";
    return query($q);
}


function registrasi($data){
    global $db;
    $full_name = stripslashes($data["full_name"]);
    $email = $data["email"];
    $password = mysqli_real_escape_string($db,$data["password"]);
    $password2 = mysqli_real_escape_string($db,$data["password2"]);
    

    // cek username dan email sudah ada atau belum
    $result = mysqli_query($db, "SELECT email FROM user WHERE email = '$email' ");
    if (mysqli_fetch_assoc($result)){
        echo "
        <script>
            alert('email sudah diambil oleh user lain!');

        </script>
        ";
        return false;
    }
    if ( $password != $password2){
        echo "
        <script>
            alert('konfirmasi password tidak sesuai!');

        </script>
        ";
        return false;
    }
    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    mysqli_query($db, "INSERT INTO user VALUES('','$full_name','$email','$password','admin')");
    return mysqli_affected_rows($db);

}

// function activity(){

// }


?>