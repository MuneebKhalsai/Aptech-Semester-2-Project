<?php
include 'header.php';

?>
              <img src="https://media.istockphoto.com/id/1214581187/photo/covid-19-inscription-across-blurred-screen-of-laptop-and-stack-of-newspapers.jpg?s=1024x1024&w=is&k=20&c=WgZ6lJGtw4nm2Dz-XcV941iZuLkd5WtUTSQ1MV5nSM4=" width="100%" height="600px">
            
                <div class="container">
                    <div class="row">
                    
                        <div class="col-lg-6 col-12">
                            <div class="contact-form">
                                
                                <h2 class="text-center mb-lg-3 mb-2">Contact Us</h2>
                            
                                <form role="form" action="#booking" method="POST">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
                                        </div>

                                        <div class="col-lg-6 col-12">
                                            <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email" required>
                                        </div>

                                        <div class="col-lg-6 col-12">
                                            <input type="telephone" name="phone" id="phone" class="form-control" placeholder="Contact no:" required>
                                        </div>

                                        <div class="col-lg-6 col-12">
                                            <input type="date" name="date" id="date" value="" class="form-control" required>
                                            
                                        </div>

                                        <div class="col-12">
                                            <textarea class="form-control" rows="5" id="message" name="message" placeholder="Your  Message" required></textarea>
                                        </div>

                                        <div class="col-lg-3 col-md-4 col-6 mx-auto">
                                            <button type="submit" class=" form-control" id="submit-button" name="submit">Submit</button>
                                        </div>
                                            </div>
                                </form>              
                                <?php
                                if(isset($_POST['submit'])){
                                    $n = $_POST['name'];
                                    $e = $_POST['email'];
                                    $p = $_POST['phone'];
                                    $d = $_POST['date'];
                                    $m = $_POST['message'];

                                    $q1 = "INSERT INTO `contact`(`fullname`,`email`,`phone`,`date`,`message`) VALUES('$n','$e','$p','$d','$m')";
                                    mysqli_query($db,$q1);
                                }
                                ?>                
                            </div>
                        </div>
                                         <div class="col-lg-6 col-12">
                                         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3620.1265735836896!2d67.00896077391538!3d24.8595262452977!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33e106b3b43bf%3A0x5eb5d6051bdeea6!2sCivil%20Hospital%20Rd%2C%20Karachi%2C%20Karachi%20City%2C%20Sindh%2C%20Pakistan!5e0!3m2!1sen!2s!4v1721478017753!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                               </div>
                                


                    </div>
                </div>
            
               </main>
<?php
include 'footer.php';
?>