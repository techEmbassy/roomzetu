<?php $title="Contact-us"; 
include('includes/header.php');

?>

<style>
    .contact-info .heading,
    .contact-form .heading {
        text-transform: capitalize;
    }
    
    .social-networks {
        overflow: hidden;
        text-align: center;
    }
    
    .social-networks ul {
        margin-top: -5px;
        padding: 0;
        display: inline-block;
    }
    
    .social-networks ul li {
        float: left;
        text-decoration: none;
        list-style: none;
        margin-right: 20px;
    }
    
    .social-networks ul li:last-child {
        margin-right: 0;
    }
    
    .social-networks ul li a {
        color: #999;
        font-size: 25px;
    }
    
    .contact-info .social-networks ul li a i {
        background: none;
    }
    
    h2.title:after {
        content: " ";
        position: absolute;
        border: 1px solid #f5f5f5;
        bottom: 8px;
        left: 0;
        width: 100%;
        height: 0;
        z-index: -2;
    }

</style>

<body>

    <?php include ('includes/nav.php');?>


    <section>
        <!--form-->
        <br><br>
        <div class="container">
            <div class="row p-0  justify-content-center">
                <div class="col-sm-8 p-4">
                    <h3 class="card-header">Contact Us</h3>
                    <p>We are here to answer any questions you may have about our system. Reach out to us and we’ll respond as soon as we can. Even if there is something you have always wanted to experience and can’t find it here, let us know and we promise we’ll do our best to get it for you.</p>
                    <div class="card-block">
                        <form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="sending_mail.php">


                            <div class="form-group col-md-6">
                                <b>Name <span class="text-red">*</span></b>
                                <input type="text" name="name" class="form-control" required placeholder="Name" style="text-transform: capitalize;">
                            </div>
                            <div class="form-group col-md-6">
                                <b>Email <span class="text-red">*</span></b>

                                <input type="email" name="email" class="form-control" placeholder="Email" type="email" data-input='email' data-invalid-message='invalid email' required>

                            </div>
                            <div class="form-group col-md-12">
                                <b>Subject <span class="text-red">*</span></b>

                                <input type="text" name="subject" class="form-control" required placeholder="Subject" style="text-transform: capitalize;">
                            </div>
                            <div class="form-group col-md-12">
                                <b>Message <span class="text-red">*</span></b>

                                <textarea name="message" id="message" required class="form-control" rows="8" placeholder="Your Message Here"></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
                            </div>
                        </form>

                    </div>


                </div>
                <div class="col-sm-4 p-4">
                    <div class="contact-info">
                        <h2 class="title">Contact Info</h2>
                        <address>
	    					<p>Lacel Technologies</p>
							<p>Mazima mall, Kabalagala</p>
							<p>Kampala Uganda</p>
							<p>Mobile: +256 758 968 333</p>
							<p>Fax: 1-714-252-0026</p>
							<p>Email: info@laceltech.com</p>
							<p>website: www.laceltech.com</p>
	    				</address>
                        <div class="social-networks text-left">
                            <!--	    					<h2 class="title text-center">Social Networking</h2>-->
                            <ul class="m-0 p-0">
                                <li>
                                    <a href="#"><i class="fa fa-facebook text-blue"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-twitter text-blue"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-google-plus text-red"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-youtube text-red"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>




                </div>

            </div>
        </div>
        <br><br>
    </section>


</body>
<?php include ('includes/footer.php');?>

</html>
