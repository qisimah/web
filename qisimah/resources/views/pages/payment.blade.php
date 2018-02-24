@extends('layouts.master')
@section('title')
    Payment
@endsection
@section('content')


          <div class="widget">
            <div class="widget-body">
              <form id="form-horizontal" class="form-horizontal">
                <h3>Select a Plan</h3>
                <fieldset>
              <div class="widget clear">
                <div class="widget-body">
                    <div class="media-left col-xs-12 col-md-3 col-sm-6">
                                          <div class="widget">
                                    <div style="height: 200px" class="overlay-container overlay-color"><img src="{{asset('images/icons/rapper.png')}}" alt="" class="overlay-bg img-responsive"></div>
                                    <div style="position: relative"><a href="#" style="position: absolute; top: -70px; left: 50%; margin-left: -50px; border-radius: 50%; padding: 3px; background-color: #FFF"><img src="{{asset('images/icons/rapper.png')}}" width="100" alt="" class="img-circle"></a></div>
                                    <div class="p-20 bd-l bd-r" style>
                                      <h4 class="widget-title text-center mt-30 mb-5 price-plan">Basic</h4>
                                      <ul style="list-style-type:none; margin: 20px;">
                                        <li><img src="{{asset('images/icons/price-plan-check.svg')}}"> 1 artist Account</li>
                                        <li><img src="{{asset('images/icons/price-plan-check.svg')}}"> Real-time Detection Dashboard</li>
                                        <li><img src="{{asset('images/icons/price-plan-check.svg')}}"> Automated Twitter integration </li>
                                        <li style="color: #E0E4EA; background: 0 0; font-weight: 500; text-decoration: line-through">Content Play Snapshot / Rank</li>
                                        <li style="color: #E0E4EA; background: 0 0; font-weight: 500; text-decoration: line-through">Report Summary</li>
                                        <li style="color: #E0E4EA; background: 0 0; font-weight: 500; text-decoration: line-through">General Report</li>
                                        <li style="color: #E0E4EA; background: 0 0; font-weight: 500; text-decoration: line-through">Broadcaster report</li>
                                        <li style="color: #E0E4EA; background: 0 0; font-weight: 500; text-decoration: line-through">Content Report</li>
                                        <li style="color: #E0E4EA; background: 0 0; font-weight: 500; text-decoration: line-through">Export</li>
                                        <li style="color: #E0E4EA; background: 0 0; font-weight: 500; text-decoration: line-through">Head-to-Head Comparison</li>                                        
                                        <li style="color: #E0E4EA; background: 0 0; font-weight: 500; text-decoration: line-through">Pulse Report</li>


                                      </ul>
                                      <!-- <p></p> -->
                                    </div>
                                    <div class="row row-0 p-15 text-center bg-black">
                                      <div class="col-xs-12">
                                        <div class="fs-36 fw-500">GH₵45</div>
                                        <div class="text-muted">Per Country/Month</div>
                                      </div>
                                  </div>
                        </div>
                    </div>

                     <div class="media-left col-xs-12 col-md-3 col-sm-6">
                                          <div class="widget">
                                    <div style="height: 200px" class="overlay-container overlay-color"><img src="{{asset('images/icons/standard.jpg')}}" alt="" class="overlay-bg img-responsive"></div>
                                    <div style="position: relative"><a href="#" style="position: absolute; top: -70px; left: 50%; margin-left: -50px; border-radius: 50%; padding: 3px; background-color: #FFF"><img src="{{asset('images/icons/standard.jpg')}}" width="100" alt="" class="img-circle"></a></div>
                                    <div class="p-20 bd-l bd-r">
                                      <h4 class="widget-title text-center mt-30 mb-5">Standard</h4>
                                       <ul style="list-style-type:none; margin: 20px;">
                                         <li><img src="{{asset('images/icons/price-plan-check.svg')}}"> 1 artist Account</li>
                                        <li><img src="{{asset('images/icons/price-plan-check.svg')}}"> Real-time Detection Dashboard</li>
                                        <li><img src="{{asset('images/icons/price-plan-check.svg')}}"> Automated Twitter integration </li>
                                        <li><img src="{{asset('images/icons/price-plan-check.svg')}}"> Content Play Snapshot / Rank</li>
                                        <li><img src="{{asset('images/icons/price-plan-check.svg')}}"> Report Summary</li>
                                        <li style="color: #E0E4EA; background: 0 0; font-weight: 500; text-decoration: line-through">General Report</li>
                                        <li style="color: #E0E4EA; background: 0 0; font-weight: 500; text-decoration: line-through">Broadcaster report</li>
                                        <li style="color: #E0E4EA; background: 0 0; font-weight: 500; text-decoration: line-through">Content Report</li>
                                        <li style="color: #E0E4EA; background: 0 0; font-weight: 500; text-decoration: line-through">Export</li>
                                        <li style="color: #E0E4EA; background: 0 0; font-weight: 500; text-decoration: line-through">Head-to-Head Comparison</li>
                                        <li style="color: #E0E4EA; background: 0 0; font-weight: 500; text-decoration: line-through">Pulse Report</li>

                                      </ul>
                                    </div>
                                    <div class="row row-0 p-15 text-center bg-black">
                                      <div class="col-xs-12">
                                        <div class="fs-36 fw-500">GH₵225</div>
                                        <div class="text-muted">Per Country/Month</div>
                                      </div>
                                  </div>
                        </div>
                    </div>

                    <div class="media-left col-xs-12 col-md-3 col-sm-6">
                                          <div class="widget">
                                    <div style="height: 200px" class="overlay-container overlay-color"><img src="{{asset('images/icons/Premium.jpg')}}" alt="" class="overlay-bg img-responsive"></div>
                                    <div style="position: relative"><a href="#" style="position: absolute; top: -70px; left: 50%; margin-left: -50px; border-radius: 50%; padding: 3px; background-color: #FFF"><img src="{{asset('images/icons/Premium.jpg')}}" width="100" alt="" class="img-circle"></a></div>
                                    <div class="p-20 bd-l bd-r">
                                      <h4 class="widget-title text-center mt-30 mb-5">Premium</h4>
                                       <ul style="list-style-type:none; margin: 20px;">
                                         <li> <img src="{{asset('images/icons/price-plan-check.svg')}}"> Min 4 artist Accounts</li>
                                        <li> <img src="{{asset('images/icons/price-plan-check.svg')}}"> Real-time Detection Dashboard</li>
                                        <li> <img src="{{asset('images/icons/price-plan-check.svg')}}"> Automated Twitter integration </li>
                                        <li> <img src="{{asset('images/icons/price-plan-check.svg')}}"> Content Play Snapshot / Rank</li>
                                        <li> <img src="{{asset('images/icons/price-plan-check.svg')}}"> Report Summary</li>
                                        <li> <img src="{{asset('images/icons/price-plan-check.svg')}}"> General Report</li>
                                        <li><img src="{{asset('images/icons/price-plan-check.svg')}}"> Broadcaster report</li>
                                        <li><img src="{{asset('images/icons/price-plan-check.svg')}}"> Content Report</li>
                                        <li><img src="{{asset('images/icons/price-plan-check.svg')}}"> Export</li>
                                        <li><img src="{{asset('images/icons/price-plan-check.svg')}}"> Head-to-Head Comparison</li>
                                        <li style="color: #E0E4EA; background: 0 0; font-weight: 500; text-decoration: line-through">Pulse Report</li>


                                      </ul>
                                    </div>
                                    <div class="row row-0 p-15 text-center bg-black">
                                      <div class="col-xs-12">
                                        <div class="fs-36 fw-500">GH₵675</div>
                                        <div class="text-muted">Per country/Month</div>
                                      </div>
                                  </div>
                        </div>
                    </div>  

                                          <div class="media-left col-xs-12 col-md-3 col-sm-6">
                                                              <div class="widget">
                                    <div style="height: 200px" class="overlay-container overlay-color"><img src="{{asset('images/icons/Enterprise.jpg')}}" alt="" class="overlay-bg img-responsive"></div>
                                    <div style="position: relative"><a href="#" style="position: absolute; top: -70px; left: 50%; margin-left: -50px; border-radius: 50%; padding: 3px; background-color: #FFF"><img src="{{asset('images/icons/Enterprise.jpg')}}" width="100" alt="" class="img-circle"></a></div>
                                    <div class="p-20 bd-l bd-r">
                                      <h4 class="widget-title text-center mt-30 mb-5">Enterprise</h4>
                                       <ul style="list-style-type:none; margin: 20px;" >
                                         <li><img src="{{asset('images/icons/price-plan-check.svg')}}"> 11+ artist Accounts</li>
                                        <li><img src="{{asset('images/icons/price-plan-check.svg')}}"> Real-time Detection Dashboard</li>
                                        <li><img src="{{asset('images/icons/price-plan-check.svg')}}"> Automated Twitter integration </li>
                                        <li> <img src="{{asset('images/icons/price-plan-check.svg')}}"> Content Play Snapshot / Rank</li>
                                        <li> <img src="{{asset('images/icons/price-plan-check.svg')}}"> Report Summary</li>
                                        <li><img src="{{asset('images/icons/price-plan-check.svg')}}"> General Report</li>
                                        <li><img src="{{asset('images/icons/price-plan-check.svg')}}"> Broadcaster report</li>
                                        <li><img src="{{asset('images/icons/price-plan-check.svg')}}"> Content Report</li>
                                        <li><img src="{{asset('images/icons/price-plan-check.svg')}}"> Export</li>
                                        <li><img src="{{asset('images/icons/price-plan-check.svg')}}"> Head-to-Head Comparison</li>
                                        <li><img src="{{asset('images/icons/price-plan-check.svg')}}"> Pulse Report</li>


                                      </ul>
                                    </div>
                                    <div class="row row-0 p-15 text-center bg-black">
                                      <div class="col-xs-12">
                                        <div class="fs-36 fw-500">Contact Us</div>
                                        <div class="text-muted">Custom Company Plan</div>
                                      </div>
                                  </div>
                        </div>
                    </div>                                    
                                      
                </div>
                </fieldset>
                <h3>Select Countries</h3>
                <fieldset>
                <br>
                <br>
                  <div class="row">
                    <div class="col-md-8 offset-md-2">
                      <div class="form-group">
                        <label for="ddlCountryShipping" class="col-sm-3 col-md-4 control-label">Add Countries</label>
                        <div class="col-sm-9 col-md-8">
                          <select id="ddlCountryShipping" name="ddlCountryShipping" class="form-control">
                          <option value="">--Please Select--</option>
                              <!-- <option value="AF">Afghanistan</option>
                            <option value="AX">Åland Islands</option>
                            <option value="AL">Albania</option>
                            <option value="DZ">Algeria</option>
                            <option value="AS">American Samoa</option>
                            <option value="AD">Andorra</option>
                            <option value="AO">Angola</option>
                            <option value="AI">Anguilla</option>
                            <option value="AQ">Antarctica</option>
                            <option value="AG">Antigua and Barbuda</option>
                            <option value="AR">Argentina</option>
                            <option value="AM">Armenia</option>
                            <option value="AW">Aruba</option>
                            <option value="AU">Australia</option>
                            <option value="AT">Austria</option>
                            <option value="AZ">Azerbaijan</option>
                            <option value="BS">Bahamas</option>
                            <option value="BH">Bahrain</option>
                            <option value="BD">Bangladesh</option>
                            <option value="BB">Barbados</option>
                            <option value="BY">Belarus</option>
                            <option value="BE">Belgium</option>
                            <option value="BZ">Belize</option>
                            <option value="BJ">Benin</option>
                            <option value="BM">Bermuda</option>
                            <option value="BT">Bhutan</option>
                            <option value="BO">Bolivia</option>
                            <option value="BA">Bosnia and Herzegovina</option>
                            <option value="BW">Botswana</option>
                            <option value="BV">Bouvet Island</option>
                            <option value="BR">Brazil</option>
                            <option value="IO">British Indian Ocean Territory</option>
                            <option value="VG">British Virgin Islands</option>
                            <option value="BN">Brunei</option>
                            <option value="BG">Bulgaria</option>
                            <option value="BF">Burkina Faso</option>
                            <option value="BI">Burundi</option>
                            <option value="KH">Cambodia</option>
                            <option value="CM">Cameroon</option>
                            <option value="CA">Canada</option>
                            <option value="CV">Cape Verde</option>
                            <option value="KY">Cayman Islands</option>
                            <option value="CF">Central African Republic</option>
                            <option value="TD">Chad</option>
                            <option value="CL">Chile</option>
                            <option value="CN">China</option>
                            <option value="CX">Christmas Island</option>
                            <option value="CC">Cocos [Keeling] Islands</option>
                            <option value="CO">Colombia</option>
                            <option value="KM">Comoros</option>
                            <option value="CG">Congo - Brazzaville</option>
                            <option value="CD">Congo - Kinshasa</option>
                            <option value="CK">Cook Islands</option>
                            <option value="CR">Costa Rica</option>
                            <option value="CI">Côte d’Ivoire</option>
                            <option value="HR">Croatia</option>
                            <option value="CU">Cuba</option>
                            <option value="CY">Cyprus</option>
                            <option value="CZ">Czech Republic</option>
                            <option value="DK">Denmark</option>
                            <option value="DJ">Djibouti</option>
                            <option value="DM">Dominica</option>
                            <option value="DO">Dominican Republic</option>
                            <option value="EC">Ecuador</option>
                            <option value="EG">Egypt</option>
                            <option value="SV">El Salvador</option>
                            <option value="GQ">Equatorial Guinea</option>
                            <option value="ER">Eritrea</option>
                            <option value="EE">Estonia</option>
                            <option value="ET">Ethiopia</option>
                            <option value="FK">Falkland Islands</option>
                            <option value="FO">Faroe Islands</option>
                            <option value="FJ">Fiji</option>
                            <option value="FI">Finland</option>
                            <option value="FR">France</option>
                            <option value="GF">French Guiana</option>
                            <option value="PF">French Polynesia</option>
                            <option value="TF">French Southern Territories</option>
                            <option value="GA">Gabon</option>
                            <option value="GM">Gambia</option>
                            <option value="GE">Georgia</option>
                            <option value="DE">Germany</option> -->
                            <option value="GH">Ghana</option>
                            <!-- <option value="GI">Gibraltar</option>
                            <option value="GR">Greece</option>
                            <option value="GL">Greenland</option>
                            <option value="GD">Grenada</option>
                            <option value="GP">Guadeloupe</option>
                            <option value="GU">Guam</option>
                            <option value="GT">Guatemala</option>
                            <option value="GG">Guernsey</option>
                            <option value="GN">Guinea</option>
                            <option value="GW">Guinea-Bissau</option>
                            <option value="GY">Guyana</option>
                            <option value="HT">Haiti</option>
                            <option value="HM">Heard Island and McDonald Islands</option>
                            <option value="HN">Honduras</option>
                            <option value="HK">Hong Kong SAR China</option>
                            <option value="HU">Hungary</option>
                            <option value="IS">Iceland</option>
                            <option value="IN">India</option>
                            <option value="ID">Indonesia</option>
                            <option value="IR">Iran</option>
                            <option value="IQ">Iraq</option>
                            <option value="IE">Ireland</option>
                            <option value="IM">Isle of Man</option>
                            <option value="IL">Israel</option>
                            <option value="IT">Italy</option>
                            <option value="JM">Jamaica</option>
                            <option value="JP">Japan</option>
                            <option value="JE">Jersey</option>
                            <option value="JO">Jordan</option>
                            <option value="KZ">Kazakhstan</option> -->
                            <option value="KE">Kenya</option>
                            <!-- <option value="KI">Kiribati</option>
                            <option value="KW">Kuwait</option>
                            <option value="KG">Kyrgyzstan</option>
                            <option value="LA">Laos</option>
                            <option value="LV">Latvia</option>
                            <option value="LB">Lebanon</option>
                            <option value="LS">Lesotho</option>
                            <option value="LR">Liberia</option>
                            <option value="LY">Libya</option>
                            <option value="LI">Liechtenstein</option>
                            <option value="LT">Lithuania</option>
                            <option value="LU">Luxembourg</option>
                            <option value="MO">Macau SAR China</option>
                            <option value="MK">Macedonia</option>
                            <option value="MG">Madagascar</option>
                            <option value="MW">Malawi</option>
                            <option value="MY">Malaysia</option>
                            <option value="MV">Maldives</option>
                            <option value="ML">Mali</option>
                            <option value="MT">Malta</option>
                            <option value="MH">Marshall Islands</option>
                            <option value="MQ">Martinique</option>
                            <option value="MR">Mauritania</option>
                            <option value="MU">Mauritius</option>
                            <option value="YT">Mayotte</option>
                            <option value="MX">Mexico</option>
                            <option value="FM">Micronesia</option>
                            <option value="MD">Moldova</option>
                            <option value="MC">Monaco</option>
                            <option value="MN">Mongolia</option>
                            <option value="ME">Montenegro</option>
                            <option value="MS">Montserrat</option>
                            <option value="MA">Morocco</option>
                            <option value="MZ">Mozambique</option>
                            <option value="MM">Myanmar [Burma]</option>
                            <option value="NA">Namibia</option>
                            <option value="NR">Nauru</option>
                            <option value="NP">Nepal</option>
                            <option value="NL">Netherlands</option>
                            <option value="AN">Netherlands Antilles</option>
                            <option value="NC">New Caledonia</option>
                            <option value="NZ">New Zealand</option>
                            <option value="NI">Nicaragua</option>
                            <option value="NE">Niger</option> -->
                            <option value="NG">Nigeria</option>
                            <!-- <option value="NU">Niue</option>
                            <option value="NF">Norfolk Island</option>
                            <option value="MP">Northern Mariana Islands</option>
                            <option value="KP">North Korea</option>
                            <option value="NO">Norway</option>
                            <option value="OM">Oman</option>
                            <option value="PK">Pakistan</option>
                            <option value="PW">Palau</option>
                            <option value="PS">Palestinian Territories</option>
                            <option value="PA">Panama</option>
                            <option value="PG">Papua New Guinea</option>
                            <option value="PY">Paraguay</option>
                            <option value="PE">Peru</option>
                            <option value="PH">Philippines</option>
                            <option value="PN">Pitcairn Islands</option>
                            <option value="PL">Poland</option>
                            <option value="PT">Portugal</option>
                            <option value="PR">Puerto Rico</option>
                            <option value="QA">Qatar</option>
                            <option value="RE">Réunion</option>
                            <option value="RO">Romania</option>
                            <option value="RU">Russia</option>
                            <option value="RW">Rwanda</option>
                            <option value="BL">Saint Barthélemy</option>
                            <option value="SH">Saint Helena</option>
                            <option value="KN">Saint Kitts and Nevis</option>
                            <option value="LC">Saint Lucia</option>
                            <option value="MF">Saint Martin</option>
                            <option value="PM">Saint Pierre and Miquelon</option>
                            <option value="VC">Saint Vincent and the Grenadines</option>
                            <option value="WS">Samoa</option>
                            <option value="SM">San Marino</option>
                            <option value="ST">São Tomé and Príncipe</option>
                            <option value="SA">Saudi Arabia</option>
                            <option value="SN">Senegal</option>
                            <option value="RS">Serbia</option>
                            <option value="SC">Seychelles</option>
                            <option value="SL">Sierra Leone</option>
                            <option value="SG">Singapore</option>
                            <option value="SK">Slovakia</option>
                            <option value="SI">Slovenia</option>
                            <option value="SB">Solomon Islands</option>
                            <option value="SO">Somalia</option> -->
                            <option value="ZA">South Africa</option>
                            <!-- <option value="GS">South Georgia and the South Sandwich Islands</option>
                            <option value="KR">South Korea</option>
                            <option value="ES">Spain</option>
                            <option value="LK">Sri Lanka</option>
                            <option value="SD">Sudan</option>
                            <option value="SR">Suriname</option>
                            <option value="SJ">Svalbard and Jan Mayen</option>
                            <option value="SZ">Swaziland</option>
                            <option value="SE">Sweden</option>
                            <option value="CH">Switzerland</option>
                            <option value="SY">Syria</option>
                            <option value="TW">Taiwan</option>
                            <option value="TJ">Tajikistan</option>
                            <option value="TZ">Tanzania</option>
                            <option value="TH">Thailand</option>
                            <option value="TL">Timor-Leste</option>
                            <option value="TG">Togo</option>
                            <option value="TK">Tokelau</option>
                            <option value="TO">Tonga</option>
                            <option value="TT">Trinidad and Tobago</option>
                            <option value="TN">Tunisia</option>
                            <option value="TR">Turkey</option>
                            <option value="TM">Turkmenistan</option>
                            <option value="TC">Turks and Caicos Islands</option>
                            <option value="TV">Tuvalu</option>
                            <option value="UG">Uganda</option>
                            <option value="UA">Ukraine</option>
                            <option value="AE">United Arab Emirates</option>
                            <option value="GB">United Kingdom</option>
                            <option value="US">United States</option>
                            <option value="UY">Uruguay</option>
                            <option value="UM">U.S. Minor Outlying Islands</option>
                            <option value="VI">U.S. Virgin Islands</option>
                            <option value="UZ">Uzbekistan</option>
                            <option value="VU">Vanuatu</option>
                            <option value="VA">Vatican City</option>
                            <option value="VE">Venezuela</option>
                            <option value="VN">Vietnam</option>
                            <option value="WF">Wallis and Futuna</option>
                            <option value="EH">Western Sahara</option>
                            <option value="YE">Yemen</option>
                            <option value="ZM">Zambia</option>
                            <option value="ZW">Zimbabwe</option> -->
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                
                </fieldset>
                <h3>Payment Information</h3>
                <fieldset>
                  <div class="row text-center">
                <div class="col-md-4 col-sm-4 col-xs-6">
                  <div style=" margin:10px;"><a href="#" style=" border-radius: 50%; background-color: #FFF"><img src="{{asset('images/icons/payment/mtn.jpg')}}" width="100" alt="" class="img-circle"></a></div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                  <div style=" margin:10px;"><a href="#" style=" border-radius: 50%; background-color: #FFF"><img src="{{asset('images/icons/payment/tigo.jpg')}}" width="100" alt="" class="img-circle"></a></div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                  <div style=" margin:10px;"><a href="#" style="border-radius: background-color: #FFF"><img src="{{asset('images/icons/payment/voda.jpg')}}" width="100" alt="" class="img-circle"></a></div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                  <div style=" margin:10px;"><a href="#" style="border-radius: 50%; background-color: #FFF"><img src="{{asset('images/icons/payment/airtel.jpg')}}" width="100" alt="" class="img-circle"></a></div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                  <div style=" margin:10px;"><a href="#" style="border-radius: 50%; background-color: #FFF"><img src="{{asset('images/icons/payment/visa.jpg')}}" width="100" alt="" class="img-circle"></a></div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                  <div style=" margin:10px;"><a href="#" style="border-radius: 50%; background-color: #FFF"><img src="{{asset('images/icons/payment/mastercard.jpg')}}" width="100" alt="" class="img-circle"></a></div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                  <div style=" margin:10px;"><a href="#" style="border-radius: 50%; background-color: #FFF"><img src="{{asset('images/icons/payment/ghlink.jpg')}}" width="100" alt="" class="img-circle"></a></div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                  <div style=" margin:10px;"><a href="#" style="border-radius: 50%; background-color: #FFF"><img src="{{asset('images/icons/payment/gip.jpg')}}" width="100" alt="" class="img-circle"></a></div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                  <div style=" margin:10px;"><a href="#" style="border-radius: 50%; background-color: #FFF"><img src="{{asset('images/icons/payment/Tela.jpg')}}" width="100" alt="" class="img-circle"></a></div>
                </div>
                <!-- Card Details -->
                    <!-- <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtNameCard" class="col-sm-3 col-md-4 control-label">Name on Card</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="txtNameCard" name="txtNameCard" type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="ddlCreditCardType" class="col-sm-3 col-md-4 control-label">Credit Card Type</label>
                        <div class="col-sm-9 col-md-8">
                          <select id="ddlCreditCardType" name="ddlCreditCardType" class="form-control">
                            <option value="">--Please Select--</option>
                            <option value="AE">American Express</option>
                            <option value="VI">Visa</option>
                            <option value="MC">MasterCard</option>
                            <option value="DI">Discover</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCreditCardNumber" class="col-sm-3 col-md-4 control-label">Credit Card Number</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="txtCreditCardNumber" name="txtCreditCardNumber" type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCardVerificationNumber" class="col-sm-3 col-md-4 control-label">Card Verification Number</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="txtCardVerificationNumber" name="txtCardVerificationNumber" type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtExpirationDate" class="col-sm-3 col-md-4 control-label">Expiration Date</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="txtExpirationDate" name="txtExpirationDate" type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                  </div> -->


                <!-- MOMO Details -->
                    <!-- <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="MomoNumber" class="col-sm-3 col-md-4 control-label">Mobile Money Number</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="MomoNumber" name="MomoNumber" type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                  </div> -->
                </fieldset>
                <h3>Order Review</h3>
                <fieldset>
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="width:10%">#</th>
                        <th style="width:40%">Product Name</th>
                        <th style="width:5%">No. of Accounts</th>
                        <th style="width:10%">Price</th>
                        <th style="width:15%">No. of Months</th>
                        <th style="width:20%">Subtotal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Premuim Package</td>
                        <td class="text-right"><select>                
                                         <option>4</option>
                                         <option>5</option>
                                         <option>6</option>
                                         <option>7</option>
                                         <option>8</option>
                                         <option>9</option>
                                         <option>10</option>
                                         </select></td>
                        <td class="text-right">GH₵675.00</td>
                        <td class="text-right"><select>
                                         
                                         <option>1</option>
                                         <option>2</option>
                                         <option>3</option>
                                         <option>4</option>
                                         <option>5</option>
                                         <option>6</option>
                                         <option>7</option>
                                         <option>8</option>
                                         <option>9</option>
                                         <option>10</option>
                                         <option>11</option>
                                         <option>1 Year</option>
                                         <option>2 Years</option>
                                         <option>3 Years</option>
                                         <option>4 Years</option>
                                         </select></td>
                        <td class="text-right">GH₵ 675.00</td>
                      </tr>
                      <tr>
                        <td colspan="5" class="text-right">Subtotal</td>
                        <td class="text-right">GH₵ 675.00</td>
                      </tr>
                      <tr>
                        <td colspan="5" class="text-right">Discount</td>
                        <td class="text-right">GH₵ 0.00</td>
                      </tr>
                      <tr>
                        <td colspan="5" class="text-right"><b>Grand Total</b></td>
                        <td class="text-right"><b>GH₵ 675.00</b></td>
                      </tr>
                    </tbody>
                  </table>
                </fieldset>
              </form>
            </div>
          </div>


    
@endsection
<!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->