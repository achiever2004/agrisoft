<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page of AGRISØFT</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./styles1.css">
</head>

<body>
    <div class="container">
        <div class="d-flex flex-column box form-box">
            <header>Registration</header>
            <form id="registrationForm" onsubmit="return saveRegistrationDetails(event)" method="post">
                <label for="category">Category</label>
                <div class="input-group mb-3">
                    <select class="custom-select" id="category" name="category" onchange="toggleIdFields()">
                        <option value="1">Farmer</option>
                        <option value="2">Landlord</option>
                        <option value="3">Assistant</option>
                    </select>
                </div>
                <div>
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control gap_placeholder" required />
                </div>
                <div>
                    <label for="age">Age</label>
                    <input type="number" id="age" name="age" class="form-control gap_placeholder" required />
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control gap_placeholder" required />
                </div>
                <div>
                    <label for="contact">Contact</label>
                    <input type="number" id="contact" name="contact" class="form-control gap_placeholder" required />
                </div>
                <div>
                    <label for="location">Location</label>
                    <input type="text" id="location" name="location" class="form-control gap_placeholder" required />
                </div>
                <div class="field links">
                    <button type="submit" class="btn btn-default">Save</button>
                </div>
            </form>
            <header>Personals</header>
            <form id="personalDetailsForm" onsubmit="return getDetails(event)" method="post">
                <p>Your Id is <b id="user_id">____</b></p>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="field input">
                    <label for="reenter_password">Reenter Password</label>
                    <input type="password" name="reenter_password" id="reenter_password" required>
                </div>
                <div class="field input" id="FarmerId" style="display: none;">
                    <label for="farmer_id">Farmer Id</label>
                    <input type="number" name="farmer_id" id="farmer_id">
                </div>
                <div class="field input" id="LandlordId" style="display: none;">
                    <label for="landlord_id">Landlord Id</label>
                    <input type="number" name="landlord_id" id="landlord_id">
                </div>
                <div class="field input" id="AssistantId" style="display: none;">
                    <label for="assistant_id">Assistant Id</label>
                    <input type="number" name="assistant_id" id="assistant_id">
                </div>
                <div class="field links">
                    <button type="submit" class="btn btn-default">Get Details</button>
                </div>
                <header>Land Details</header>
                <div>
                    <label for="land_in_acres">Land in Acres</label>
                    <input type="number" name="land_in_acres" class="form-control gap_placeholder" id="land_in_acres" required />
                </div>
                <div>
                    <label for="location_input">Location</label>
                    <input type="text" id="location_input" name="location_input" class="form-control gap_placeholder" required />
                </div>
                <div>
                    <label for="land_type">Land Type</label>
                    <div class="input-group mb-3 option">
                        <select class="custom-select" id="land_type" name="land_type">
                            <option value="1">Dry</option>
                            <option value="2">Wet</option>
                            <option value="3">Both</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label for="crop_planning">Crop Planning :</label>
                </div>
                <div class="filed links browse_file">
                    <input type="file" id="crop_planning_file" name="crop_planning_file"/>
                </div>
                <div>
                    <label for="budget">Budget</label>
                    <div class="input-group mb-3 option">
                        <select class="custom-select" id="budget" name="budget">
                            <option value="1">1 LPA</option>
                            <option value="2">3 LPA</option>
                            <option value="3">4 LPA</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label for="land_reports">Land reports</label>
                </div>
                <div class="browse_file">
                    <input type="file" id="land_reports_file" name="land_reports_file"/>
                </div>
                <header>Documentation</header>
                <div>
                    <label for="legal_agreements">Legal Agreements</label>
                </div>
                <div class="filed links browse_file">
                    <input type="file" id="legal_agreements_file" name="legal_agreements_file"/>
                </div>
                <div>
                    <label for="contract_details">Contract details</label>
                </div>
                <div class="filed links browse_file">
                    <input type="file" id="contract_details_file" name="contract_details_file"/>
                </div>
                <div class="d-flex flex-row">
                    <div class="field links">
                        <a href="./agrisoft.php"><button type="button" class="btn btn-default">Go Back</button></a>
                    </div>
                    <div class="Rsubmit">
                        <a href="./login.php"><button type="button" class="btn btn-default" onclick="submitForm()">Submit</button></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        function toggleIdFields() {
            var category = document.getElementById("category").value;
            document.getElementById("FarmerId").style.display = 'none';
            document.getElementById("LandlordId").style.display = 'none';
            document.getElementById("AssistantId").style.display = 'none';

            if (category == '1') {
                document.getElementById("LandlordId").style.display = 'block';
                document.getElementById("AssistantId").style.display = 'block';
            } else if (category == '2') {
                document.getElementById("FarmerId").style.display = 'block';
                document.getElementById("AssistantId").style.display = 'block';
            } else if (category == '3') {
                document.getElementById("FarmerId").style.display = 'block';
                document.getElementById("LandlordId").style.display = 'block';
            }
        }

        function saveRegistrationDetails(event) {
            event.preventDefault();
            var formData = new FormData(document.getElementById("registrationForm"));

            $.ajax({
                type: "POST",
                url: "save_registration.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    var result = JSON.parse(response);
                    if (result.success) {
                        document.getElementById("user_id").innerText = result.user_id;
                    } else {
                        alert("Error: " + result.error);
                    }
                }
            });
        }

        function getDetails(event) {
            event.preventDefault();
            var formData = new FormData(document.getElementById("personalDetailsForm"));
            formData.append("category", document.getElementById("category").value);
            formData.append("id", document.getElementById("user_id").innerText);

            $.ajax({
                type: "POST",
                url: "get_details.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    var result = JSON.parse(response);
                    if (result.success) {
                        var data = result.data;
                        document.getElementById("land_in_acres").value = data.land_in_acres;
                        document.getElementById("location_input").value = data.location;
                        document.getElementById("land_type").value = data.land_type;
                        // Populate other fields as needed
                    } else {
                        alert("Error: " + result.error);
                    }
                }
            });
        }

        function submitForm() {
            var formData = new FormData(document.getElementById("personalDetailsForm"));
            formData.append("id", document.getElementById("user_id").innerText);
            formData.append("category", document.getElementById("category").value);

            $.ajax({
                type: "POST",
                url: "update_details.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    var result = JSON.parse(response);
                    if (result.success) {
                        alert("Details updated successfully");
                    } else {
                        alert("Error: " + result.error);
                    }
                }
            });
        }
    </script>
</body>
</html>
