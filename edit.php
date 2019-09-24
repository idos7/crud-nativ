<?php
// import koneksi
include_once("config.php");

// proses update
if(isset($_POST['update']))
{   
    $id = $_POST['id'];

    $name=$_POST['name'];
    $usrname=$_POST['username'];
    $email=$_POST['email'];
    $pwd = $_POST['password'];
    if ($name == "") {
        header("location:tambah.php?nama=");        
    }elseif ($email == "") {
        header("location:tambah.php?email=");        
    }elseif ($usrname == "") {
        header("location:tambah.php?usrname=");        
    }elseif ($pwd == "") {
        header("location:tambah.php?pwd=");        
    } else {
    // query sql update data
    $result = mysqli_query($mysqli, "UPDATE user SET nama='$name',email='$email',username='$usrname', password='$pwd' WHERE username= '$id'");

// setelah proses menhapus maka akan langsung diarahkan ke halaman awal
    header("Location: index.php");}
}
?>
<?php
// menampilkan data user terpilih berdasarkan username
// mengambil dATA id dari yang diakses saat membuka halaman ini, id berupa data username 
$id = $_GET['id'];

//query menampilkan data user terpilih
$result = mysqli_query($mysqli, "SELECT * FROM user WHERE username = '$id'");

while($data = mysqli_fetch_array($result))
{
    $name = $data['nama'];
    $email = $data['email'];
    $usrname = $data['username'];
    $pwd =  $data['password'];
}
?>
<html>
<head>  
    <title>Edit Data</title>
</head>

<body>
    <a href="index.php">Kembali</a>
    <br/><br/>
    
    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Name</td>
                <td><input type="text" name="name" value=<?php echo $name;?>></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="text" name="email" value=<?php echo $email;?>></td>
            </tr>
            <tr> 
                <td>Username</td>
                <td><input type="text" name="username" value=<?php echo $usrname;?>></td>
            </tr>
            <tr> 
                <td>password</td>
                <td><input type="text" name="password" value=<?php echo $pwd?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
    <?php 
	if(isset($_GET['nama'])){
		if($_GET['nama'] == ""){
            echo "<h4 style='color:red'>nama kosong!</h4>";
		}
    }
    if(isset($_GET['email'])){
		if($_GET['email'] == ""){
			echo "<h4 style='color:red'>email kosong!</h4>";
		}
    }
    if(isset($_GET['usrname'])){
		if($_GET['usrname'] == ""){
			echo "<h4 style='color:red'>username kosong!</h4>";
		}
    }
    if(isset($_GET['pwd'])){
		if($_GET['pwd'] == ""){
			echo "<h4 style='color:red'>password kosong!</h4>";
		}
	}
	?>
</body>
</html>