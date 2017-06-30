 <div id="overlay">
                <div class="close-overlay">
                    <i class="ion-close-round close-icon"></i>
                </div>
                <div class="reserve-popup" id="reservepopup">
                    <h3 class="succes-h3">გადახდის მეთოდები</h3>
                    <input type="hidden" id="orderid" value="">

                    <!-- <p class="under-h3 long-copy">თქვენ იყიდეთ პირველი თანხა რაც წერია იმ ფასად ! პირველი ღილაკი (იყიდე ეხლავე და 10 ლარი მოაკელით თქვენს გადასახადს) ! ღილაკი მეორე (იყიდეთ და მოაკელით სრული თანხის 10%</p> -->
                    <div class="row centerd-mine">
                        <!-- <p class="under-h3 inline">გადაიხადე <span class="price-box" id="reserve-price">300</span> GEL წინასწარ</p>
                        <button class="button-second" id="buybutton">ყიდვა</button> -->
                        <div class="col span-5-of-7 centerd-mine righted-mine">
                            <p class="under-h3 inline fonti-erti-xazistvis">გადაიხადე <span class="price-box buyfivepercent">300</span> ლ წინასწარ და მიიღე 5%-იანი ფასდაკლება მთლიან თანხაზე.  ფასი:<span class="price-box buyfivepercent_final">300</span> ₾</p>
                        </div>
                         <div class="col span-2-of-7 left-but-cont">
                            <button class="button-second" id="buyfivepercent_button">ყიდვა</button>
                         </div>
                    </div>

                     <div class="row centerd-mine">
                        <div class="col span-5-of-7 centerd-mine righted-mine">
                            <p class="under-h3 inline fonti-erti-xazistvis">გადაიხადე <!-- <span class="price-box buytenpercent">300</span> -->
                            სრული თანხა  წინასწარ და მიიღე 10%-იანი ფასდაკლება. ფასი:<span class="price-box buytenpercent_final">300</span> ₾</p>
                        </div>
                         <div class="col span-2-of-7 left-but-cont">
                            <button class="button-second" id="buytenpercent_button">ყიდვა</button>
                         </div>
                    </div>

                     <div class="row centerd-mine">
                        <div class="col span-5-of-7 centerd-mine righted-mine">
                            <p class="under-h3 inline fonti-erti-xazistvis">ადგილზე გადავიხდი <span class="price-box" id="reserve-price">300</span> ლარს </p>
                        </div>
                         <div class="col span-2-of-7 left-but-cont">
                            <button class="button-second" id="reservebutton">დაჯავშნა</button>
                         </div>
                    </div>

                    <!-- <p class="under-h3">ხოლო თქვენი უნიკალური კოდი : <span class="price-box" id="reserve-code">300 GEL</span></p> -->
                   
                    <!-- <div class="row partial-container-second modify-container">
                        <span class="price-first-mine" id="price-box-sale1">300 GEL</span>
                        <span class="price-second-mine" id="price-box-sale2">300 GEL</span> 
                    </div> -->
                    <!-- <div class="row partial-container-second">
                        <button class="button-second" id="buybutton">იყიდე</button>
                        <button class="button-third" id="buybutton">იყიდე</button>
                    </div> -->
                </div>

                <!-- price-box-sale2 price-box-sale1 -->
                
                <div class="registration-chooser" id="registration-chooser">
                    <div class="row">
                        <h3 class="header-third">Choose Login Form</h3>
                    </div>
                    <div class="row butons-container">
                        <div class="row button-container">
                           
                            <div class="button-login facebook-button" id="logfacebook">

                            Login With Facebook

                                     
                            </div>


                        </div>
                        <div class="row button-container">
                            <div class="button-login account-button" id="login-with-account">Login With Account</div>
                        </div>
                    </div>
                </div>
                <div class="login-form" id="login-form">
                    <div class="row">
                        <h3 class="header-third">Log In</h3>
                    </div>
                    <div class="row butons-container">
                        <div class="row button-container">
                            <input type="email" id="logemail" placeholder="Email" class="big-input">
                        </div>
                        <div class="row button-container">
                            <input type="password" id="logpassword" placeholder="Password" class="big-input">
                        </div>
                        <div class="row button-container">
                            <div class="button-login account-button" id="loginuser">Log In</div>
                        </div>
                        <div class="row button-container">
                            <div class="button-login account-button" id="create-account">Create Account</div>
                        </div>
                    </div>
                </div>
                <div class="create-account-form" id="create-account-form">
                 
                    <div class="row">
                        <h3 class="header-third">Create Account</h3>
                    </div>
                    <div class="row butons-container">
                        <div class="row button-container">
                            <input type="text" id="username" placeholder="Name" class="big-input">
                        </div>
                        <div class="row button-container">
                            <input type="email" id = "email" placeholder="Email" class="big-input">
                        </div>
                        <div class="row button-container">
                            <input type="text" id="phone" placeholder="Phone Number" class="big-input">
                        </div>
                        <div class="row button-container">
                            <input type="password" id="password" placeholder="Password" class="big-input">
                        </div>
                        <div class="row button-container">
                            <input type="password" id="confirmpass" placeholder="Confirm Password" class="big-input">
                        </div>
                        <div class="row" id="errors" style="display:none">
                            <p id="error"></p>
                        </div>
                        <div class="row button-container">
                            <div class="button-login account-button" id="createaccount">Create Account</div>
                        </div>
                    </div>
                   
                </div>
              

            