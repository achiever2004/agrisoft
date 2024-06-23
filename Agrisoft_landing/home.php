<?php
session_start();
include("./php/config.php");

if (!isset($_SESSION['valid'])) {
    header("Location: login.php");
    exit;
}

$id = $_SESSION['id'];
$query = mysqli_query($con, "SELECT * FROM users WHERE Id=$id");

while ($result = mysqli_fetch_assoc($query)) {
    $res_category = $result['category'];
    $res_name = $result['name'];
    $res_age = $result['age'];
    $res_email = $result['email'];
    $res_contact = $result['contact'];
    $res_location = $result['location'];

    if($res_category == 1){
        $catg = 'farmer';
    }else if($res_category == 2){
        $catg = 'landlord';
    }else{
     $catg = 'assistant';
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./styles.css">
</head>

<body>
            <div>
                <nav class="navbar navbar-light bg-light fixed-top">
                    <a class="navbar-brand" href="#">
                        <img src="https://res.cloudinary.com/do6twjc6g/image/upload/v1713801800/logo-aruk_mslbcd.png"
                            width="50" height="50" alt="" loading="lazy">
                    </a>
                    <p>Welcome <b><?php echo $res_name ?></b> your category is <b><?php echo $catg ?></b></p>
                    <div class="form-inline ">
                        
                        <div onclick="display('section01')">
                            <button class="btn btn-outline-success"> Home</button>
                        </div>
                        <div>
                            <button class="btn btn-outline-success" onclick="window.location.href='contactus.php'">Contact</button>
                        </div>
                        <div onclick="display('section1_1')">
                            <button class="btn btn-outline-success"> Market</button>
                        </div>
                        <div>
                            <button class="btn btn-outline-success" onclick="window.location.href='collaboration.php'">Collabrate</button>
                        </div>
                        <div>
                            <img src="https://res.cloudinary.com/do6twjc6g/image/upload/v1709136511/person_prwrix.jpg"
                                width="35">
                        </div>
                    </div>
                </nav>
            </div>
            <div class="container">
                <div class="row d-flex flex-row justify-content-">
                    <div class="market_index">
                        <div class="d-flex flex-row">
                           
                            <div class="d-flex flex-row marketnav">
                                <a>
                                    <h2 class="dashboard" onclick="display('section1_1')">Crop Overview</h2>
                                </a>
                                <a>
                                    <h2 class="dashboard" onclick="display('section1_2')">Markt statistics</h2>
                                </a>
                                <a>
                                    <h2 class="dashboard" onclick="display('section1_3')">Weather Updates</h2>
                                </a>
                                <a>
                                    <h2 class="dashboard" onclick="display('section1_4')">Friends Updates</h2>
                                </a>
                                <a>
                                    <h2 class="dashboard" onclick="display('section1_5')">Schemes</h2>
                                </a>
                                <a>
                                    <h2 class="dashboard" onclick="display('section1_6')">Transport</h2>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <div id="section01">
        
            
            <div class="container">
                <div class="row">
                    <h1>Land Status</h1>
                    <div class=" d-flex flex-row">
                        <p class="landtxt">AgriSoft empowers 250 young individuals by training them as farmers,
                            modifying their skills through AgriSoft's platform for enhanced agricultural productivity
                            and sustainability
                        </p>
                        <div class="d-flex flex-column justify-content-center view ">
                            <img src="https://res.cloudinary.com/do6twjc6g/image/upload/v1717863449/dry_land_poeehm.jpg"
                                class="landstatus" alt="...">
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <h1>Crop Status</h1>
                    <div class=" d-flex flex-row">
                        <p class="landtxt">AgriSoft empowers 250 young individuals by training them as farmers,
                            modifying their skills through AgriSoft's platform for enhanced agricultural productivity
                            and sustainability
                        </p>
                        <div class="d-flex flex-column justify-content-center view ">
                            <img src="https://res.cloudinary.com/do6twjc6g/image/upload/v1717863773/crop_status_w9uaah.webp"
                                class="landstatus" alt="...">
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <h1>Working Team</h1>
                    <div class=" d-flex flex-row">
                        <p class="landtxt">AgriSoft empowers 250 young individuals by training them as farmers,
                            modifying their skills through AgriSoft's platform for enhanced agricultural productivity
                            and sustainability
                        </p>
                        <div class="d-flex flex-column justify-content-center view ">
                            <img src="https://res.cloudinary.com/do6twjc6g/image/upload/v1717864870/famers_toibcl.jpg"
                                class="landstatus1" alt="...">
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div id="section1_1">
        
            
            
            <div class="container">
                <div class="row">
                    <div class="d-flex flex-column">
                        <div class="land">
                            <h3>Land Under cultivation :</h3>
                        </div>
                        <div class="d-flex flex-row">
                            <div>
                                <div>
                                    <img class="cultivate_box"
                                        src="https://res.cloudinary.com/do6twjc6g/image/upload/v1718095315/Black-cotton_eh2xhf.webp">
                                </div>
                                <h5 class="Cultivate_txt">20 Acres</h5>
                            </div>
                            <div>
                                <div>
                                    <img class="cultivate_box"
                                        src="https://res.cloudinary.com/do6twjc6g/image/upload/v1718095326/maxresdefault_ai5dwk.jpg">
                                </div>
                                <h5 class="Cultivate_txt">30 Acres</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column">
                    <div class="land1">
                        <h3>Land Under Activities :</h3>
                    </div>
                    <div class="d-flex flex-row">
                        <div>
                            <div>
                                <img class="cultivate_box"
                                    src="https://res.cloudinary.com/do6twjc6g/image/upload/v1718095948/regulated-farming_m4peu7.jpg">
                            </div>
                            <h5 class="Cultivate_txt">20 Acres</h5>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div id="section1_2">
        
            
            
            <div class="container">
                <div class="row">
                    <div class="market_box">
                        <h5 class="txt_m">Your <span>20 acrs</span> of vegetables category with <b>wheat crop</b> will be
                            sold in
                            Telangana at 3362/Q ( Check
                            the price trend from recent markets)</h5>
                    </div>
                </div>
            </div>
            <div>
                <p>......</p>
            </div>
            <div class="container">
                <div class="row">
                    <div class="d-flex flex-row">
                        <div class="Category">
                            <h4>Category</h4>
                            <div class="input-group mb-3">
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option value="2">
                                        <h3> </h3>
                                    </option>
                                    <option value="2">All</option>
                                    <option value="3">Cereals and millets</option>
                                    <option value="4">Vegetables</option>
                                    <option value="5">Fibers</option>
                                    <option value="6">Oil Crops</option>
                                    <option value="7">Pulses</option>
                                    <option value="8">Spices</option>
                                    <option value="9">Fruits</option>
                                    <option value="10">Plantation</option>
                                    <option value="11">Dryfruits and nuts</option>
                                    <option value="13">Flowers</option>
                                    <option value="14">Others</option>
                                </select>
                            </div>
                        </div>
                        <div class="Category">
                            <h4>Crop</h4>
                            <div class="input-group mb-3">
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option value="2">
                                        <h3> </h3>
                                    </option>
                                    <option value="2">All</option>
                                    <option value="3">Wheat</option>
                                    <option value="4">Maize</option>
                                    <option value="5">Paddy</option>
                                    <option value="6">Pearl millet</option>
                                    <option value="7">Sorghum</option>
                                    <option value="8">Barley</option>
                                    <option value="9">Finger millet</option>
                                    <option value="10">Foxtail millet</option>
                                    <option value="11">Amaranth grain</option>
                                    <option value="13">Oat</option>
                                    <option value="14">Quinoa</option>
                                    <option value="14">Little Millet</option>
                                </select>
                            </div>
                        </div>
                        <div class="Category">
                            <h4>State</h4>
                            <div class="input-group mb-3">
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option value="2">
                                        <h3> </h3>
                                    </option>
                                    <option value="2">All</option>
                                    <option value="3">Andhra Pradesh</option>
                                    <option value="4">Telangana</option>
                                    <option value="5">Bihar</option>
                                    <option value="6">Chhattisgarh</option>
                                    <option value="7">Gujarat</option>
                                    <option value="8">Jharkhand</option>
                                    <option value="9">Karnataka</option>
                                    <option value="10">Madhya Pradesh</option>
                                    <option value="11">Maharashtra</option>
                                    <option value="13">Rajasthan</option>
                                    <option value="14">Uttar Pradesh</option>
                                    <option value="14">Uttarakhand</option>
                                    <option value="14">West Bengal</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
    
            </div>
            <div class="container">
                <div class="row">
                    <div class="d-flex flex-row">
                        <div class="market_box1_1">
                            <p>Wheat Average</p>
                            <u>
                                <p>Location</p>
                            </u>
                            <u>
                                <p>Updated dates</p>
                            </u>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div id="section1_3">
        
            
            <div class="container">
                <div class="row">
                    <div class="d-flex flex-column">
                        <div class="d-flex flex-row">
                            <div class="Category">
                                <h4>Location</h4>
                                <div class="input-group mb-3">
                                    <select class="custom-select" id="inputGroupSelect01">
                                        <option value="2">
                                            <h3> </h3>
                                        </option>
                                        <option value="2">All</option>
                                        <option value="3">...</option>
                                        <option value="4">........</option>
                                        <option value="5">........</option>
                                        <option value="6">......</option>
                                        <option value="7">......</option>
                                        <option value="8">......</option>
                                        <option value="9">......</option>
                                        <option value="10">.......</option>
                                        <option value="11">........</option>
                                        <option value="13">......</option>
                                        <option value="14">........</option>
                                    </select>
                                </div>
                            </div>
                            <div class="Category">
                                <h4>Date</h4>
                                <div class="input-group mb-3">
                                    <select class="custom-select" id="inputGroupSelect01">
                                        <option value="2">
                                            <h3> </h3>
                                        </option>
                                        <option value="2">All</option>
                                        <option value="3">...</option>
                                        <option value="4">........</option>
                                        <option value="5">........</option>
                                        <option value="6">......</option>
                                        <option value="7">......</option>
                                        <option value="8">......</option>
                                        <option value="9">......</option>
                                        <option value="10">.......</option>
                                        <option value="11">........</option>
                                        <option value="13">......</option>
                                        <option value="14">........</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-row">
                        <div class="loc_box0">
                            <div class="d-flex flex-row">
                                <div class="update_weather">
                                    <p><b>Shamshabad</b></p>
                                    <p>Updated 2/6/24 Monday</p>
                                </div>
                                <div class="d-flex flex-row sunny_cloud">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="64" height="64">
                                        <!-- Sun -->
                                        <circle cx="20" cy="20" r="10" fill="#FFD700" />
                                        <!-- Sun rays -->
                                        <g stroke="#FFD700" stroke-width="2">
                                            <line x1="20" y1="4" x2="20" y2="0" />
                                            <line x1="20" y1="40" x2="20" y2="44" />
                                            <line x1="4" y1="20" x2="0" y2="20" />
                                            <line x1="40" y1="20" x2="44" y2="20" />
                                            <line x1="5.86" y1="5.86" x2="2.93" y2="2.93" />
                                            <line x1="34.14" y1="34.14" x2="37.07" y2="37.07" />
                                            <line x1="5.86" y1="34.14" x2="2.93" y2="37.07" />
                                            <line x1="34.14" y1="5.86" x2="37.07" y2="2.93" />
                                        </g>
                                        <!-- Cloud -->
                                        <path
                                            d="M48,32c-0.015,0-0.03,0.002-0.045,0.002C46.72,23.696,39.274,17,30,17c-8.234,0-15.008,6.206-15.943,14.199C5.965,32.22,2,36.703,2,42c0,6.075,4.925,11,11,11h35c5.523,0,10-4.477,10-10S53.523,32,48,32z"
                                            fill="#90CAF9" />
                                    </svg>
                                    <div class="d-flex flex-row">
                                        <p><b>30°</b></p>
                                        <p class="cloudy"><b>Cloudy</b></p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-row cloudy1">
                                <div class="d-flex flex-column">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="60" height="60">
                                        <path
                                            d="M48,32c-0.015,0-0.03,0.002-0.045,0.002C46.72,23.696,39.274,17,30,17c-8.234,0-15.008,6.206-15.943,14.199C5.965,32.22,2,36.703,2,42c0,6.075,4.925,11,11,11h35c5.523,0,10-4.477,10-10S53.523,32,48,32z"
                                            fill="#90CAF9" />
                                    </svg>
                                    <p>Mon</p>
                                </div>
                                <div class="d-flex flex-column">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="60" height="60">
                                        <path
                                            d="M48,32c-0.015,0-0.03,0.002-0.045,0.002C46.72,23.696,39.274,17,30,17c-8.234,0-15.008,6.206-15.943,14.199C5.965,32.22,2,36.703,2,42c0,6.075,4.925,11,11,11h35c5.523,0,10-4.477,10-10S53.523,32,48,32z"
                                            fill="#90CAF9" />
                                    </svg>
                                    <p>Tue</p>
                                </div>
                                <div class="d-flex flex-column">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="64" height="64">
                                        <g fill="#90CAF9">
                                            <path
                                                d="M48,32c-0.015,0-0.03,0.002-0.045,0.002C46.72,23.696,39.274,17,30,17c-8.234,0-15.008,6.206-15.943,14.199C5.965,32.22,2,36.703,2,42c0,6.075,4.925,11,11,11h35c5.523,0,10-4.477,10-10S53.523,32,48,32z" />
                                        </g>
                                        <polygon points="27,46 37,46 33,52 43,52 30,64 34,56 24,56" fill="#FFD700" />
                                    </svg>
                                    <p>wed</p>
                                </div>
                                <div class="d-flex flex-column">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="64" height="64">
                                        <g fill="#90CAF9">
                                            <path
                                                d="M48,32c-0.015,0-0.03,0.002-0.045,0.002C46.72,23.696,39.274,17,30,17c-8.234,0-15.008,6.206-15.943,14.199C5.965,32.22,2,36.703,2,42c0,6.075,4.925,11,11,11h35c5.523,0,10-4.477,10-10S53.523,32,48,32z" />
                                        </g>
                                        <polygon points="27,46 37,46 33,52 43,52 30,64 34,56 24,56" fill="#FFD700" />
                                    </svg>
                                    <p>Thu</p>
                                </div>
                                <div class="d-flex flex-column">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="64" height="64">
                                        <!-- Sun -->
                                        <circle cx="20" cy="20" r="10" fill="#FFD700" />
                                        <!-- Sun rays -->
                                        <g stroke="#FFD700" stroke-width="2">
                                            <line x1="20" y1="4" x2="20" y2="0" />
                                            <line x1="20" y1="40" x2="20" y2="44" />
                                            <line x1="4" y1="20" x2="0" y2="20" />
                                            <line x1="40" y1="20" x2="44" y2="20" />
                                            <line x1="5.86" y1="5.86" x2="2.93" y2="2.93" />
                                            <line x1="34.14" y1="34.14" x2="37.07" y2="37.07" />
                                            <line x1="5.86" y1="34.14" x2="2.93" y2="37.07" />
                                            <line x1="34.14" y1="5.86" x2="37.07" y2="2.93" />
                                        </g>
                                        <!-- Cloud -->
                                        <path
                                            d="M48,32c-0.015,0-0.03,0.002-0.045,0.002C46.72,23.696,39.274,17,30,17c-8.234,0-15.008,6.206-15.943,14.199C5.965,32.22,2,36.703,2,42c0,6.075,4.925,11,11,11h35c5.523,0,10-4.477,10-10S53.523,32,48,32z"
                                            fill="#90CAF9" />
                                    </svg>
                                    <p>Fri</p>
                                </div>
                                <div class="d-flex flex-column">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="64" height="64">
                                        <path
                                            d="M48,32c-0.015,0-0.03,0.002-0.045,0.002C46.72,23.696,39.274,17,30,17c-8.234,0-15.008,6.206-15.943,14.199C5.965,32.22,2,36.703,2,42c0,6.075,4.925,11,11,11h35c5.523,0,10-4.477,10-10S53.523,32,48,32z"
                                            fill="#90CAF9" />
                                    </svg>
                                    <p>Sat</p>
                                </div>
                                <div class="d-flex flex-column">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="64" height="64">
                                        <!-- Sun -->
                                        <circle cx="20" cy="20" r="10" fill="#FFD700" />
                                        <!-- Sun rays -->
                                        <g stroke="#FFD700" stroke-width="2">
                                            <line x1="20" y1="4" x2="20" y2="0" />
                                            <line x1="20" y1="40" x2="20" y2="44" />
                                            <line x1="4" y1="20" x2="0" y2="20" />
                                            <line x1="40" y1="20" x2="44" y2="20" />
                                            <line x1="5.86" y1="5.86" x2="2.93" y2="2.93" />
                                            <line x1="34.14" y1="34.14" x2="37.07" y2="37.07" />
                                            <line x1="5.86" y1="34.14" x2="2.93" y2="37.07" />
                                            <line x1="34.14" y1="5.86" x2="37.07" y2="2.93" />
                                        </g>
                                        <!-- Cloud -->
                                        <path
                                            d="M48,32c-0.015,0-0.03,0.002-0.045,0.002C46.72,23.696,39.274,17,30,17c-8.234,0-15.008,6.206-15.943,14.199C5.965,32.22,2,36.703,2,42c0,6.075,4.925,11,11,11h35c5.523,0,10-4.477,10-10S53.523,32,48,32z"
                                            fill="#90CAF9" />
                                    </svg>
                                    <p>Sun</p>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <div class="friend_box1_1">
                                <div class="loc_box">
                                    <div class="d-flex flex-row">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="30" fill="currentColor"
                                            class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                                        </svg>
                                        <p>Shamshabad</p>
                                    </div>
                                    <p>Mon 4 June</p>
                                </div>
                                <div class="loc1_box d-flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="60" height="60">
                                        <path
                                            d="M48,32c-0.015,0-0.03,0.002-0.045,0.002C46.72,23.696,39.274,17,30,17c-8.234,0-15.008,6.206-15.943,14.199C5.965,32.22,2,36.703,2,42c0,6.075,4.925,11,11,11h35c5.523,0,10-4.477,10-10S53.523,32,48,32z"
                                            fill="#90CAF9" />
                                    </svg>
                                    <p><b>28°</b></p>
                                </div>
                                <div class="d-flex flex-row clouds">
                                    <div class="d-flex flex-column">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="60" height="60">
                                            <path
                                                d="M48,32c-0.015,0-0.03,0.002-0.045,0.002C46.72,23.696,39.274,17,30,17c-8.234,0-15.008,6.206-15.943,14.199C5.965,32.22,2,36.703,2,42c0,6.075,4.925,11,11,11h35c5.523,0,10-4.477,10-10S53.523,32,48,32z"
                                                fill="#90CAF9" />
                                        </svg>
                                        <p>Mon</p>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="64" height="64">
                                            <!-- Sun -->
                                            <circle cx="20" cy="20" r="10" fill="#FFD700" />
                                            <!-- Sun rays -->
                                            <g stroke="#FFD700" stroke-width="2">
                                                <line x1="20" y1="4" x2="20" y2="0" />
                                                <line x1="20" y1="40" x2="20" y2="44" />
                                                <line x1="4" y1="20" x2="0" y2="20" />
                                                <line x1="40" y1="20" x2="44" y2="20" />
                                                <line x1="5.86" y1="5.86" x2="2.93" y2="2.93" />
                                                <line x1="34.14" y1="34.14" x2="37.07" y2="37.07" />
                                                <line x1="5.86" y1="34.14" x2="2.93" y2="37.07" />
                                                <line x1="34.14" y1="5.86" x2="37.07" y2="2.93" />
                                            </g>
                                            <!-- Cloud -->
                                            <path
                                                d="M48,32c-0.015,0-0.03,0.002-0.045,0.002C46.72,23.696,39.274,17,30,17c-8.234,0-15.008,6.206-15.943,14.199C5.965,32.22,2,36.703,2,42c0,6.075,4.925,11,11,11h35c5.523,0,10-4.477,10-10S53.523,32,48,32z"
                                                fill="#90CAF9" />
                                        </svg>
                                        <p>Tue</p>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="60" height="60">
                                            <path
                                                d="M48,32c-0.015,0-0.03,0.002-0.045,0.002C46.72,23.696,39.274,17,30,17c-8.234,0-15.008,6.206-15.943,14.199C5.965,32.22,2,36.703,2,42c0,6.075,4.925,11,11,11h35c5.523,0,10-4.477,10-10S53.523,32,48,32z"
                                                fill="#90CAF9" />
                                        </svg>
                                        <p>Wed</p>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="64" height="64">
                                            <!-- Sun -->
                                            <circle cx="20" cy="20" r="10" fill="#FFD700" />
                                            <!-- Sun rays -->
                                            <g stroke="#FFD700" stroke-width="2">
                                                <line x1="20" y1="4" x2="20" y2="0" />
                                                <line x1="20" y1="40" x2="20" y2="44" />
                                                <line x1="4" y1="20" x2="0" y2="20" />
                                                <line x1="40" y1="20" x2="44" y2="20" />
                                                <line x1="5.86" y1="5.86" x2="2.93" y2="2.93" />
                                                <line x1="34.14" y1="34.14" x2="37.07" y2="37.07" />
                                                <line x1="5.86" y1="34.14" x2="2.93" y2="37.07" />
                                                <line x1="34.14" y1="5.86" x2="37.07" y2="2.93" />
                                            </g>
                                            <!-- Cloud -->
                                            <path
                                                d="M48,32c-0.015,0-0.03,0.002-0.045,0.002C46.72,23.696,39.274,17,30,17c-8.234,0-15.008,6.206-15.943,14.199C5.965,32.22,2,36.703,2,42c0,6.075,4.925,11,11,11h35c5.523,0,10-4.477,10-10S53.523,32,48,32z"
                                                fill="#90CAF9" />
                                        </svg>
                                        <p>Thus</p>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="60" height="60">
                                            <path
                                                d="M48,32c-0.015,0-0.03,0.002-0.045,0.002C46.72,23.696,39.274,17,30,17c-8.234,0-15.008,6.206-15.943,14.199C5.965,32.22,2,36.703,2,42c0,6.075,4.925,11,11,11h35c5.523,0,10-4.477,10-10S53.523,32,48,32z"
                                                fill="#90CAF9" />
                                        </svg>
                                        <p>Fri</p>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="64" height="64">
                                            <g fill="#90CAF9">
                                                <path
                                                    d="M48,32c-0.015,0-0.03,0.002-0.045,0.002C46.72,23.696,39.274,17,30,17c-8.234,0-15.008,6.206-15.943,14.199C5.965,32.22,2,36.703,2,42c0,6.075,4.925,11,11,11h35c5.523,0,10-4.477,10-10S53.523,32,48,32z" />
                                            </g>
                                            <polygon points="27,46 37,46 33,52 43,52 30,64 34,56 24,56" fill="#FFD700" />
                                        </svg>
                                        <p>Sat</p>
                                    </div>
                                </div>
                            </div>
                            <div class="friend_box1_2">
                                <p class="text_weather"><b>Your crop is in Growing Stage,there is no problem with rains</b>
                                </p>
                            </div>
                        </div>
    
                    </div>
                </div>
            </div>
    </div>
    <div id="section1_4">
        
            
            
            </div>
            <div class="container">
                <div class="row">
                    <div class="Friends_market ">
                        <img src="https://res.cloudinary.com/do6twjc6g/image/upload/v1718043758/crop_ir5ga5.jpg" alt=""
                            class="userimage" width="100" height="100">
                    </div>
                    <div class="Friends_market1 ">
                        <h5>
                            <pre>mallesh (Id :          )</pre>
                        </h5>
                        <p>Imporved land with organic manure which imporved 12% growth rate of my crop</p>
                    </div>
                </div>  
            </div>
            <div class="container">
                <div class="row">
                    <div class="Friends_market1_1">
                        <img src="https://res.cloudinary.com/do6twjc6g/image/upload/v1718043758/crop_ir5ga5.jpg" alt=""
                            class="userimage" width="100" height="100">
                    </div>
                    <div class="Friends_market1_2">
                        <h5>
                            <pre>Ram(Id :          )</pre>
                        </h5>
                        <p>Joined Agrisoft to transport my Yield in different states which imporved my 20% outreach</p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="Friends_market1_1">
                        <img src="https://res.cloudinary.com/do6twjc6g/image/upload/v1718043758/crop_ir5ga5.jpg" alt=""
                            class="userimage" width="100" height="100">
                    </div>
                    <div class="Friends_market1_2">
                        <h5>
                            <pre>Ravi(Id :          )</pre>
                        </h5>
                        <p>Joined Agrisoft to transport my Yield in different states which imporved my 20% outreach</p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="Friends_market1_1">
                        <img src="https://res.cloudinary.com/do6twjc6g/image/upload/v1718043758/crop_ir5ga5.jpg" alt=""
                            class="userimage" width="100" height="100">
                    </div>
                    <div class="Friends_market1_2">
                        <h5>
                            <pre>Raju(Id :          )</pre>
                        </h5>
                        <p>Joined Agrisoft to transport my Yield in different states which imporved my 20% outreach</p>
                    </div>
                </div>
            </div>
    </div>
    <div id="section1_5">
        
            
            
            <div class="container">
                <div class="row">
                    <div class="Friends_market ">
                        <img src="https://res.cloudinary.com/do6twjc6g/image/upload/v1718102388/Sukanya-Samriddhi-Yojana_bgg4gh.png" alt=""
                            class="userimage" width="100" height="100">
                    </div>
                    <div class="Friends_market1 " style="margin-right: 3vw;">
                    
                        <p >Sukanya Samridhi Yojana Interest Rate Hiked</p>
                        <a href="https://www.myscheme.gov.in/schemes/ssy">Know More</a>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-share" viewBox="0 0 16 16">
                            <path
                                d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.5 2.5 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5m-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3m11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row Schemes">
                    <div class="Friends_market ">
                        <img src="https://res.cloudinary.com/do6twjc6g/image/upload/v1718043758/crop_ir5ga5.jpg"
                            class="userimage" width="100" height="100">
                    </div>
                    <div class="Friends_market1 "  style="margin-right: 3vw;">
                    
                        <p>Agri Drones to 15,000 womens Groups</p>
                        <a href=".......">Know More</a>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-share "viewBox="0 0 16 16">
                            <path
                                d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.5 2.5 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5m-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3m11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row Schemes">
                    <div class="Friends_market ">
                        <img src="https://res.cloudinary.com/do6twjc6g/image/upload/v1718043758/crop_ir5ga5.jpg"
                            class="userimage" width="100" height="100">
                    </div>
                    <div class="Friends_market1 "  style="margin-right: 3vw;">
                    
                        <p>Banks to drive Rs-1 lakh cr AIF to boost Agriculture </p>
                        <a href="">Know More</a>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-share" viewBox="0 0 16 16">
                            <path
                                d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.5 2.5 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5m-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3m11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row Schemes">
                    <div class="Friends_market ">
                        <img src="https://res.cloudinary.com/do6twjc6g/image/upload/w_1000,ar_16:9,c_fill,g_auto,e_sharpen/v1718110079/PMGKAY-Free-Ration-Scheme-Yojana-Apply-Online_pdus2m.webp"
                            class="userimage" width="100" height="100">
                    </div>
                    <div class="Friends_market1 "  style="margin-right: 3vw;">
                    
                        <p>PMGKAY : Free Ration Scheme</p>
                        <a href="https://www.myscheme.gov.in/schemes/pm-gkay">Know More</a>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-share" viewBox="0 0 16 16">
                            <path
                                d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.5 2.5 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5m-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3m11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3" />
                        </svg>
                    </div>
                </div>
            </div>
    </div>
    <div id="section1_6">
        
            
            
            <div class="transport1">
                <p><b>Your 20 acres od land is done with 2 Cycles</b></p>
                <p><b>Production : </b></p>
                <p><b>Quantity : </b></p>
                <p><b>Dealer : </b></p>
                <p><b>State : </b></p>
                <p><b>Crop : </b></p>
                <p><b>Avg Price : </b></p>
            </div>
            <div class="d-flex flex-row">
                <div class="container">
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal"
                        data-target="#myModal">Contact</button>
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="d=flex flex-row reach">
                                    <h3>Reach us</h3>
                                </div>
                                <div class="modal-body">
                                    <input type="text" id="form3Example1c" class="form-control gap_placeholder"
                                        placeholder="Name" />
                                    <input type="text" id="form3Example1c" class="form-control gap_placeholder"
                                        placeholder="E-mail" />
                                    <input type="text" id="form3Example1c" class="form-control gap_placeholder"
                                        placeholder="Moblie umber" />
                                    <div class="form-group description_post">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                            placeholder="description"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default submit"
                                        data-dismiss="modal">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="issues">
                <p>To update any Transport related issues.</p>
            </div>
            <div class="container">
                <div class="row">
                    <div class="market_box1_6">
                        <p class="transport_txt"><b>Your crop got 20 % profit while compared with local markets.</b></p>
                    </div>
                </div>
            </div>
    </div>

    <script type="text/javascript"
        src="https://d1tgh8fmlzexmh.cloudfront.net/ccbp-static-website/js/ccbp-ui-kit.js"></script>
</body>

</html>