<ul class="list-inline social-list" style="position: fixed; top: 0; z-index: 999">
    <li>
        <a href="join-us">
            <span>
                <i class="ti-angle-left" style="font-size: 1em;"></i>
            </span>
            Back to available positions
        </a>
    </li>
</ul>
<a id="top"></a>
<section>
    <div class="row" style="text-align:center;">
        <span><img alt="Logo" class="logo" style="max-width: 10%;"
                   src="img/AppLogo.png"/><h2><b>Found a position you're interested in? <br/> Please fill in the application form below</b></h2></span>
    </div>
    <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
        <div class="feature boxed bg-secondary">
            <form class="text-center" data-form-type="default" action="application-form-submit.php" method="post" enctype="multipart/form-data" data-error="There were errors, please check all required fields and try again" data-success="Thanks for taking the time to complete the planner. We'll be in touch shortly!">
                <h4 class="uppercase mt48 mt-xs-0">Please fill in the application form for <? echo $_GET["position"]; ?></h4>
        
                <div class="overflow-hidden">
                    <h6 class="uppercase">
                        1. Your personal details
                    </h6>
                    <input type="text" name="position" value="<? echo $_GET['position']; ?>" disabled style="display: none;" />
                    <input type="text" name="name" class="col-md-9 validate-required" placeholder="Full Name*" />
                    <input type="text" name="email" class="col-md-9 validate-required validate-email" placeholder="Email Address*" />
                    <input type="text" name="number" class="col-md-9 validate-required" placeholder="Phone Number*" />
                    <button class="btn" name="filePlaceholder" onclick="document.getElementsByName('fileToUpload')[0].click(); return false;">Attach your resume</button>
                    <input type="file" name="fileToUpload" style="display: none;" onchange="fileSubmit(this)" />
                    <script>
                        document.getElementsByName("filePlaceholder")[0].preventDefault();

                        function fileSubmit(data) {
                            var file = data.value;
                            var fileName = file.split("\\");
                            if (fileName == "") fileName = "Attach your resume";
                            document.getElementsByName("filePlaceholder")[0].innerHTML = fileName[fileName.length-1];
                            return false;
                        }
                    </script>
                    All document file formats are supported up to 5mb
                </div>
                <div class="overflow-hidden">
                    <h6 class="uppercase">
                        2. Program details
                    </h6>
                    <div class="select-option">
                        <i class="ti-angle-down"></i>
                        <select name="school-year">
                            <option selected value="Default">Select your current school year</option>
                            <option value="1st year">1st year</option>
                            <option value="2nd year">2nd year</option>
                            <option value="3rd year">3rd year</option>
                            <option value="4th year">4th year</option>
                            <option value="Post-grad">Post-grad</option>
                        </select>
                    </div>

                    <input type="text" name="program" class="col-md-9 validate-required" placeholder="Program*"/>
                    <hr>
                </div>
                <div class="overflow-hidden">
                    <h6 class="uppercase">
                        3. Links (fill in if you have any of these)
                    </h6>
                    <input type="text" name="linkedin" placeholder="Linkedin URL" />
                    <input type="text" name="github" placeholder="Github URL" />
                    <hr>
                </div>
                <div class="overflow-hidden">
                    <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" value="Submit Application" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
