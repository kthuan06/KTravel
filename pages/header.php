<?php
    if(isset($_GET['logout']) && $_GET['logout'] == 1){
        unset($_SESSION['cart']);
        unset($_SESSION['Register']);
        unset($_SESSION['id_user']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KTRAVEL</title>
    <link rel="shortcut icon" href="images/logo1.png" />
    <link rel="stylesheet" href="./css/menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./css/popup.css">
    <link rel="stylesheet" href="../js/popup.js">
</head>


<body class="" style="background-color: #E0F4FF;" >
   

	<nav class="relative  px-4 py-4 flex justify-between items-center bg-blue-100">
		<a class="text-3xl font-bold leading-none " href="#">
			<img src="images/logo1.png" class="hidden lg:block w-12 h-12 rounded-2xl" alt="">
		</a>
		<div class="lg:hidden">
			<button class="navbar-burger flex items-center text-blue-600 p-3">
				<svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
					<title>Mobile menu</title>
					<path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
				</svg>
			</button>
		</div>
		<ul class="hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-6">
        <?php
                include('admin/config/config.php');
                

                $sql_select_menu = "SELECT *FROM list_menu";
                $query = mysqli_query($mysqli, $sql_select_menu);
            
                while($row = mysqli_fetch_array($query)){
            ?>
        
        <li><a class="font-bold  text-black-400 hover:text-gray-500"  href="<?php echo $row['list_address']?>"><?php echo $row['list_name']?></a></li>
			<li class="text-gray-300">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
				</svg>
			</li>

            <?php
                            
                }if(isset($_SESSION['Register'])){
                        ?>
                        <li class="mb-1">
                            <a class="block p-4 text-sm font-semibold text-black-400 hover:bg-blue-50 hover:text-blue-600 rounded"  href=""><i class="fa-solid fa-user"></i></a>
                        </li>
                        <?php
                    }    
                ?>
			
		</ul>
        <?php
            if(isset($_SESSION['Register'])){
                echo ' <a href="index.php?logout=1" class="hidden lg:inline-block py-2 px-6 bg-blue-500 hover:bg-blue-600 text-sm text-white font-bold rounded-xl transition duration-200" >Xin chào: '.$_SESSION['Register'].' <i class="fa-solid fa-right-from-bracket"></i></a>';
            }else{
        ?> 
		<a class="hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-50 hover:bg-gray-100 text-sm text-gray-900 font-bold  rounded-xl transition duration-200" href="http://localhost/DACS2/main/login.php">Đăng nhập</a>
		<a class="hidden lg:inline-block py-2 px-6 bg-blue-500 hover:bg-blue-600 text-sm text-white font-bold rounded-xl transition duration-200"href="http://localhost/DACS2/main/register.php">Đăng kí</a>
        <?php
            }
            ?>
    </nav>
	<div class="navbar-menu relative z-50 hidden">
		<div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
		<nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
			<div class="flex items-center mb-8">
				<a class="mr-auto text-3xl font-bold leading-none" href="#">
                
			<img src="images/logo1.png" class=" w-12 h-12 rounded-2xl" alt="">
		
				</a>
				<button class="navbar-close">
					<svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
					</svg>
				</button>
			</div>
			<div>
				<ul>
                <?php
                include('admin/config/config.php');
                

                $sql_select_menu = "SELECT *FROM list_menu";
                $query = mysqli_query($mysqli, $sql_select_menu);
            
                while($row = mysqli_fetch_array($query)){
            ?>
					<li class="mb-1">
						<a class="block p-4 text-sm font-semibold text-black-400 hover:bg-blue-50 hover:text-blue-600 rounded"  href="<?php echo $row['list_address']?>"><?php echo $row['list_name'] ?> </a>
					</li>
					
                    <?php
                }
                if(isset($_SESSION['Register'])){
                    ?>
                    <li class="mb-1">
						<a class="block p-4 text-sm font-semibold text-black-400 hover:bg-blue-50 hover:text-blue-600 rounded"  href=""><i class="fa-solid fa-user"></i></a>
					</li>
                    <?php
                }
                ?>

				</ul>
			</div>
			<div class="mt-auto">
                    <?php
                        if(isset($_SESSION['Register'])){
                            echo '<a href="index.php?logout=1" class="block px-4 py-3 mb-3 leading-loose text-xs text-center font-semibold leading-none bg-gray-50 hover:bg-gray-100 rounded-xl">Xin chào: '.$_SESSION['Register'].' <i class="fa-solid fa-right-from-bracket"></i></a>';
                        }else{
                    ?> 
				<div class="pt-6">
					<a class="block px-4 py-3 mb-3 leading-loose text-xs text-center font-semibold leading-none bg-gray-50 hover:bg-gray-100 rounded-xl" href="http://localhost/DACS2/main/login.php">Đăng nhập</a>
					<a class="block px-4 py-3 mb-2 leading-loose text-xs text-center text-white font-semibold bg-blue-600 hover:bg-blue-700  rounded-xl" href="http://localhost/DACS2/main/register.php">Đăng kí</a>
				</div>
                <?php
                        }
                        ?>
				
			</div>
		</nav>
	</div>
</body>

<script>
// Burger menus
document.addEventListener('DOMContentLoaded', function() {
    // open
    const burger = document.querySelectorAll('.navbar-burger');
    const menu = document.querySelectorAll('.navbar-menu');

    if (burger.length && menu.length) {
        for (var i = 0; i < burger.length; i++) {
            burger[i].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }

    // close
    const close = document.querySelectorAll('.navbar-close');
    const backdrop = document.querySelectorAll('.navbar-backdrop');

    if (close.length) {
        for (var i = 0; i < close.length; i++) {
            close[i].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }

    if (backdrop.length) {
        for (var i = 0; i < backdrop.length; i++) {
            backdrop[i].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }
});
</script>
