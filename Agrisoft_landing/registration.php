<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>landing page of AGRISØFT </title>
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
    <link rel="stylesheet" href="./styles1.css">
</head>

<body>
    <div class="container">
        <div class="dflex flex-column box form-box">
            <div>
                
                <header>Registration:</header>
                <label for="category">Category</label>
                <div class="input-group mb-3">
                <select class="custom-select" id="category" name="category">
                    <option value="1">Farmer</option>
                    <option value="2">Landlord</option>
                    <option value="3">Assistant</option>
                </select>
                </div>
                <div>
                    <label for="Name">Name :</label>
                    <input type="text" id="form3Example1c" class="form-control gap_placeholder" placeholder="" />
                </div>
                <div>
                <label for="Age">Age</label>
                    <input type="int" id="form3Example1c" class="form-control gap_placeholder" />

                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="text" id="form3Example1c" class="form-control gap_placeholder" />
                </div>
                <div>
                    <label for="Contact">Contact :</label>
                    <input type="int" id="form3Example1c" class="form-control gap_placeholder" placeholder="" />
                </div>
                <div>
                    <label for="email">Location :</label>
                    <input type="text" id="form3Example1c" class="form-control gap_placeholder" placeholder="" />
                </div>
            </div>
            <div class="field links">
                <button type="button" class="btn btn-default" data-dismiss="modal">Save</button>
            </div>
            <header>Personals:</header>

           <!-- modified from gpt -->

            <form id="registrationForm" onsubmit="return saveUserDetails()" method="post">

                <form action=""method="post">
                    <div class="field input">
                        <label for="ID">ID:</label>
                        <input type="int" name="ID" id="ID" required>
                    </div>
                    <div class="field input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" required>
                    </div>
                    <div class="field input">
                        <label for=" Reenter password"> Reenter Password :</label>
                        <input type="password" name="password" id="password" required>
                    </div>
                    <div class="field links">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Get Details</button>
                    </div>
                    <div>
                        <label for="email">Land in Acres :</label>
                        <div class="input-group mb-3 option">
                            <select class="custom-select" id="inputGroupSelect01">
                                <option value="1">2 Acres</option>
                                <option value="2">3 acres</option>
                                <option value="3">4 Acres</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="email">Location :</label>
                        <input type="text" id="form3Example1c" class="form-control gap_placeholder" placeholder="" />
                    </div>
                    <div>
                        <label for="email">Land Type :</label>
                        <div class="input-group mb-3 option">
                            <select class="custom-select" id="inputGroupSelect01">
                                <option value="1">Dry</option>
                                <option value="2">Wet</option>
                                <option value="3">Both</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="email">Crop Planning :</label>
                        <input type="text" id="form3Example1c" class="form-control gap_placeholder" placeholder="Browse"/>
                    </div>
                    <div class="filed links browse_file">
                        <input type="file" id="form3Example1c"/>
                    </div>
                    <div>
                        <label for="email">Budget :</label>
                        <div class="input-group mb-3 option">
                            <select class="custom-select" id="inputGroupSelect01">
                                <option value="1">1LPA</option>
                                <option value="2">3 LPA</option>
                                <option value="3">4 LPA</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="email">Land reports :</label>
                        <input type="text" id="form3Example1c" class="form-control gap_placeholder" placeholder="Browse"/>
                    </div>
                    <div class="browse_file">
                        <input type="file" id="form3Example1c"/>
                    </div>
                    <form action=""method="post">
                        
                        <div class="field links">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Get Details</button>
                        </div>
                        <header>Documentation:</header>
                        <div>
                            <label for="email">Legal Agreements :</label>
                            <input type="text" id="form3Example1c" class="form-control gap_placeholder" placeholder="Browse"/>
                        </div>
                        <div class="filed links browse_file">
                            <input type="file" id="form3Example1c"/>
                        </div>
                        <div>
                            <label for="email">Contract details :</label>
                            <input type="text" id="form3Example1c" class="form-control gap_placeholder" placeholder="Browse"/>
                        </div>
                        <div class="filed links browse_file">
                            <input type="file" id="form3Example1c"/>
                        </div>
                    </form>
                    <div class="d-flex flex-row">
                        <div class="field links">
                            <a href="./agrisoft.php"><button type="button" class="btn btn-default" data-dismiss="modal">Go Back</button></a>
                        </div>
                        <div class="Rsubmit">
                            <a href="./login.php"><button type="button" class="btn btn-default" data-dismiss="modal">Submit</button></a>
                        </div>
                    </div>
                </form>
            </form>
        </div>
    </div>
    <script type="text/javascript"
            src="https://d1tgh8fmlzexmh.cloudfront.net/ccbp-static-website/js/ccbp-ui-kit.js">
        
        function saveUserDetails() {
            // Collect form data and save to the respective table
            var category = document.getElementById("category").value;

            // Hide all ID fields initially
            document.getElementById("FarmerId").style.display = 'none';
            document.getElementById("LandlordId").style.display = 'none';
            document.getElementById("AssistantId").style.display = 'none';

            // Show respective ID field based on the selected category
            if (category == '1') {
                document.getElementById("FarmerId").style.display = 'block';
            } else if (category == '2') {
                document.getElementById("LandlordId").style.display = 'block';
            } else if (category == '3') {
                document.getElementById("AssistantId").style.display = 'block';
            }

            return false; // Prevent form submission for demo
        }


</script>

</body>
</html>