<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <!--begin::Contacts-->
                <div class="card card-flush h-lg-100" id="kt_contacts_main">
                    <!--begin::Card header-->
                    <div class="card-header pt-7" id="kt_chat_contacts_header">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <i class="ki-duotone ki-badge fs-1 me-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                                <span class="path5"></span>
                            </i>
                            <h2>Add New Contact</h2>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-5">
                        <!--begin::Form-->
                       

                        <form  class="form" enctype="multipart/form-data"    >
                            <!--begin::Input group-->

                            <div class="row">
                                <div class="col-md-2">
                                    <div class="">
                                        <!--begin::Label-->

                                        <label class="fs-6 fw-semibold mt-3">
                                            <span class="mt-3">Insert Image</span>
                                            <span class="ms-1" data-bs-toggle="tooltip"
                                                title="Allowed file types: png, jpg, jpeg.">
                                                <i class="ki-duotone ki-information fs-7">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                            </span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Image input wrapper-->
                                       
                                        <!--end::Image input wrapper-->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <input type="file" class="dropify" name="avatar" data-min-width="200" />
                                </div>
                                <div class="col-md-10">
                                    <small class="badge badge-success">Personal information</small>

                                    <div class="row">
                                        <div class="col-md-3">
                                            
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->

                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">Surname</span>
                                                    <span class="ms-1" data-bs-toggle="tooltip"
                                                        title="Enter the contact's name.">
                                                        <i class="ki-duotone ki-information fs-7">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>
                                                    </span>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                
                                                <input wire:model="surname" type="text" class="form-control " name="surname" value="" />
                                                @error('surname') <span class="text-danger">{{ $message }}</span> @enderror
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">Other names</span>
                                                    <span class="ms-1" data-bs-toggle="tooltip"
                                                        title="Enter the contact's name.">
                                                        <i class="ki-duotone ki-information fs-7">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>
                                                    </span>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input wire:model='other_names' type="text" class="form-control " name="other_names" value="" />
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">Staff ID</span>
                                                    <span class="ms-1" data-bs-toggle="tooltip"
                                                        title="Enter the contact's name.">
                                                        <i class="ki-duotone ki-information fs-7">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>
                                                    </span>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input wire:model='staff_id_no' type="text" class="form-control " name="staff_id_no"
                                                    value="" />
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">SSN number</span>
                                                    <span class="ms-1" data-bs-toggle="tooltip"
                                                        title="Enter the contact's name.">
                                                        <i class="ki-duotone ki-information fs-7">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>
                                                    </span>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input wire:model='ssn_number' type="text" class="form-control " name="ssn_number"
                                                    value="" />
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">Gender</span>
                                                    <span class="ms-1" data-bs-toggle="tooltip"
                                                        title="Enter the contact's name.">
                                                        <i class="ki-duotone ki-information fs-7">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>
                                                    </span>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select wire:model='gender' name="gender" class="form-control" id="">
                                                    <option default>Select...</option>
                                                    <option value="male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">Country</span>
                                                    <span class="ms-1" data-bs-toggle="tooltip"
                                                        title="Enter the contact's name.">
                                                        <i class="ki-duotone ki-information fs-7">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>
                                                    </span>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select wire:model='country' name="country" class="form-control" id="">
                                                    <option default>Select...</option>
                                                    <option value="Afghanistan">Afghanistan</option>
                                                    <option value="Åland Islands">Åland Islands</option>
                                                    <option value="Albania">Albania</option>
                                                    <option value="Algeria">Algeria</option>
                                                    <option value="American Samoa">American Samoa</option>
                                                    <option value="Andorra">Andorra</option>
                                                    <option value="Angola">Angola</option>
                                                    <option value="Anguilla">Anguilla</option>
                                                    <option value="Antarctica">Antarctica</option>
                                                    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                    <option value="Argentina">Argentina</option>
                                                    <option value="Armenia">Armenia</option>
                                                    <option value="Aruba">Aruba</option>
                                                    <option value="Australia">Australia</option>
                                                    <option value="Austria">Austria</option>
                                                    <option value="Azerbaijan">Azerbaijan</option>
                                                    <option value="Bahamas">Bahamas</option>
                                                    <option value="Bahrain">Bahrain</option>
                                                    <option value="Bangladesh">Bangladesh</option>
                                                    <option value="Barbados">Barbados</option>
                                                    <option value="Belarus">Belarus</option>
                                                    <option value="Belgium">Belgium</option>
                                                    <option value="Belize">Belize</option>
                                                    <option value="Benin">Benin</option>
                                                    <option value="Bermuda">Bermuda</option>
                                                    <option value="Bhutan">Bhutan</option>
                                                    <option value="Bolivia">Bolivia</option>
                                                    <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                    <option value="Botswana">Botswana</option>
                                                    <option value="Bouvet Island">Bouvet Island</option>
                                                    <option value="Brazil">Brazil</option>
                                                    <option value="British Indian Ocean Territory">British Indian Ocean
                                                        Territory</option>
                                                    <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                    <option value="Bulgaria">Bulgaria</option>
                                                    <option value="Burkina Faso">Burkina Faso</option>
                                                    <option value="Burundi">Burundi</option>
                                                    <option value="Cambodia">Cambodia</option>
                                                    <option value="Cameroon">Cameroon</option>
                                                    <option value="Canada">Canada</option>
                                                    <option value="Cape Verde">Cape Verde</option>
                                                    <option value="Cayman Islands">Cayman Islands</option>
                                                    <option value="Central African Republic">Central African Republic</option>
                                                    <option value="Chad">Chad</option>
                                                    <option value="Chile">Chile</option>
                                                    <option value="China">China</option>
                                                    <option value="Christmas Island">Christmas Island</option>
                                                    <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                    <option value="Colombia">Colombia</option>
                                                    <option value="Comoros">Comoros</option>
                                                    <option value="Congo">Congo</option>
                                                    <option value="Congo, The Democratic Republic of The">Congo, The Democratic
                                                        Republic of The</option>
                                                    <option value="Cook Islands">Cook Islands</option>
                                                    <option value="Costa Rica">Costa Rica</option>
                                                    <option value="Cote D'ivoire">Cote D'ivoire</option>
                                                    <option value="Croatia">Croatia</option>
                                                    <option value="Cuba">Cuba</option>
                                                    <option value="Cyprus">Cyprus</option>
                                                    <option value="Czech Republic">Czech Republic</option>
                                                    <option value="Denmark">Denmark</option>
                                                    <option value="Djibouti">Djibouti</option>
                                                    <option value="Dominica">Dominica</option>
                                                    <option value="Dominican Republic">Dominican Republic</option>
                                                    <option value="Ecuador">Ecuador</option>
                                                    <option value="Egypt">Egypt</option>
                                                    <option value="El Salvador">El Salvador</option>
                                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                    <option value="Eritrea">Eritrea</option>
                                                    <option value="Estonia">Estonia</option>
                                                    <option value="Ethiopia">Ethiopia</option>
                                                    <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)
                                                    </option>
                                                    <option value="Faroe Islands">Faroe Islands</option>
                                                    <option value="Fiji">Fiji</option>
                                                    <option value="Finland">Finland</option>
                                                    <option value="France">France</option>
                                                    <option value="French Guiana">French Guiana</option>
                                                    <option value="French Polynesia">French Polynesia</option>
                                                    <option value="French Southern Territories">French Southern Territories
                                                    </option>
                                                    <option value="Gabon">Gabon</option>
                                                    <option value="Gambia">Gambia</option>
                                                    <option value="Georgia">Georgia</option>
                                                    <option value="Germany">Germany</option>
                                                    <option value="Ghana">Ghana</option>
                                                    <option value="Gibraltar">Gibraltar</option>
                                                    <option value="Greece">Greece</option>
                                                    <option value="Greenland">Greenland</option>
                                                    <option value="Grenada">Grenada</option>
                                                    <option value="Guadeloupe">Guadeloupe</option>
                                                    <option value="Guam">Guam</option>
                                                    <option value="Guatemala">Guatemala</option>
                                                    <option value="Guernsey">Guernsey</option>
                                                    <option value="Guinea">Guinea</option>
                                                    <option value="Guinea-bissau">Guinea-bissau</option>
                                                    <option value="Guyana">Guyana</option>
                                                    <option value="Haiti">Haiti</option>
                                                    <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald
                                                        Islands</option>
                                                    <option value="Holy See (Vatican City State)">Holy See (Vatican City State)
                                                    </option>
                                                    <option value="Honduras">Honduras</option>
                                                    <option value="Hong Kong">Hong Kong</option>
                                                    <option value="Hungary">Hungary</option>
                                                    <option value="Iceland">Iceland</option>
                                                    <option value="India">India</option>
                                                    <option value="Indonesia">Indonesia</option>
                                                    <option value="Iran, Islamic Republic of">Iran, Islamic Republic of
                                                    </option>
                                                    <option value="Iraq">Iraq</option>
                                                    <option value="Ireland">Ireland</option>
                                                    <option value="Isle of Man">Isle of Man</option>
                                                    <option value="Israel">Israel</option>
                                                    <option value="Italy">Italy</option>
                                                    <option value="Jamaica">Jamaica</option>
                                                    <option value="Japan">Japan</option>
                                                    <option value="Jersey">Jersey</option>
                                                    <option value="Jordan">Jordan</option>
                                                    <option value="Kazakhstan">Kazakhstan</option>
                                                    <option value="Kenya">Kenya</option>
                                                    <option value="Kiribati">Kiribati</option>
                                                    <option value="Korea, Democratic People's Republic of">Korea, Democratic
                                                        People's Republic of</option>
                                                    <option value="Korea, Republic of">Korea, Republic of</option>
                                                    <option value="Kuwait">Kuwait</option>
                                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                    <option value="Lao People's Democratic Republic">Lao People's Democratic
                                                        Republic</option>
                                                    <option value="Latvia">Latvia</option>
                                                    <option value="Lebanon">Lebanon</option>
                                                    <option value="Lesotho">Lesotho</option>
                                                    <option value="Liberia">Liberia</option>
                                                    <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                    <option value="Liechtenstein">Liechtenstein</option>
                                                    <option value="Lithuania">Lithuania</option>
                                                    <option value="Luxembourg">Luxembourg</option>
                                                    <option value="Macao">Macao</option>
                                                    <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The
                                                        Former Yugoslav Republic of</option>
                                                    <option value="Madagascar">Madagascar</option>
                                                    <option value="Malawi">Malawi</option>
                                                    <option value="Malaysia">Malaysia</option>
                                                    <option value="Maldives">Maldives</option>
                                                    <option value="Mali">Mali</option>
                                                    <option value="Malta">Malta</option>
                                                    <option value="Marshall Islands">Marshall Islands</option>
                                                    <option value="Martinique">Martinique</option>
                                                    <option value="Mauritania">Mauritania</option>
                                                    <option value="Mauritius">Mauritius</option>
                                                    <option value="Mayotte">Mayotte</option>
                                                    <option value="Mexico">Mexico</option>
                                                    <option value="Micronesia, Federated States of">Micronesia, Federated
                                                        States of</option>
                                                    <option value="Moldova, Republic of">Moldova, Republic of</option>
                                                    <option value="Monaco">Monaco</option>
                                                    <option value="Mongolia">Mongolia</option>
                                                    <option value="Montenegro">Montenegro</option>
                                                    <option value="Montserrat">Montserrat</option>
                                                    <option value="Morocco">Morocco</option>
                                                    <option value="Mozambique">Mozambique</option>
                                                    <option value="Myanmar">Myanmar</option>
                                                    <option value="Namibia">Namibia</option>
                                                    <option value="Nauru">Nauru</option>
                                                    <option value="Nepal">Nepal</option>
                                                    <option value="Netherlands">Netherlands</option>
                                                    <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                    <option value="New Caledonia">New Caledonia</option>
                                                    <option value="New Zealand">New Zealand</option>
                                                    <option value="Nicaragua">Nicaragua</option>
                                                    <option value="Niger">Niger</option>
                                                    <option value="Nigeria">Nigeria</option>
                                                    <option value="Niue">Niue</option>
                                                    <option value="Norfolk Island">Norfolk Island</option>
                                                    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                    <option value="Norway">Norway</option>
                                                    <option value="Oman">Oman</option>
                                                    <option value="Pakistan">Pakistan</option>
                                                    <option value="Palau">Palau</option>
                                                    <option value="Palestinian Territory, Occupied">Palestinian Territory,
                                                        Occupied</option>
                                                    <option value="Panama">Panama</option>
                                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                                    <option value="Paraguay">Paraguay</option>
                                                    <option value="Peru">Peru</option>
                                                    <option value="Philippines">Philippines</option>
                                                    <option value="Pitcairn">Pitcairn</option>
                                                    <option value="Poland">Poland</option>
                                                    <option value="Portugal">Portugal</option>
                                                    <option value="Puerto Rico">Puerto Rico</option>
                                                    <option value="Qatar">Qatar</option>
                                                    <option value="Reunion">Reunion</option>
                                                    <option value="Romania">Romania</option>
                                                    <option value="Russian Federation">Russian Federation</option>
                                                    <option value="Rwanda">Rwanda</option>
                                                    <option value="Saint Helena">Saint Helena</option>
                                                    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                    <option value="Saint Lucia">Saint Lucia</option>
                                                    <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon
                                                    </option>
                                                    <option value="Saint Vincent and The Grenadines">Saint Vincent and The
                                                        Grenadines</option>
                                                    <option value="Samoa">Samoa</option>
                                                    <option value="San Marino">San Marino</option>
                                                    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                                    <option value="Senegal">Senegal</option>
                                                    <option value="Serbia">Serbia</option>
                                                    <option value="Seychelles">Seychelles</option>
                                                    <option value="Sierra Leone">Sierra Leone</option>
                                                    <option value="Singapore">Singapore</option>
                                                    <option value="Slovakia">Slovakia</option>
                                                    <option value="Slovenia">Slovenia</option>
                                                    <option value="Solomon Islands">Solomon Islands</option>
                                                    <option value="Somalia">Somalia</option>
                                                    <option value="South Africa">South Africa</option>
                                                    <option value="South Georgia and The South Sandwich Islands">South Georgia
                                                        and The South Sandwich Islands</option>
                                                    <option value="Spain">Spain</option>
                                                    <option value="Sri Lanka">Sri Lanka</option>
                                                    <option value="Sudan">Sudan</option>
                                                    <option value="Suriname">Suriname</option>
                                                    <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                    <option value="Swaziland">Swaziland</option>
                                                    <option value="Sweden">Sweden</option>
                                                    <option value="Switzerland">Switzerland</option>
                                                    <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                    <option value="Taiwan">Taiwan</option>
                                                    <option value="Tajikistan">Tajikistan</option>
                                                    <option value="Tanzania, United Republic of">Tanzania, United Republic of
                                                    </option>
                                                    <option value="Thailand">Thailand</option>
                                                    <option value="Timor-leste">Timor-leste</option>
                                                    <option value="Togo">Togo</option>
                                                    <option value="Tokelau">Tokelau</option>
                                                    <option value="Tonga">Tonga</option>
                                                    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                    <option value="Tunisia">Tunisia</option>
                                                    <option value="Turkey">Turkey</option>
                                                    <option value="Turkmenistan">Turkmenistan</option>
                                                    <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                    <option value="Tuvalu">Tuvalu</option>
                                                    <option value="Uganda">Uganda</option>
                                                    <option value="Ukraine">Ukraine</option>
                                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                                    <option value="United Kingdom">United Kingdom</option>
                                                    <option value="United States">United States</option>
                                                    <option value="United States Minor Outlying Islands">United States Minor
                                                        Outlying Islands</option>
                                                    <option value="Uruguay">Uruguay</option>
                                                    <option value="Uzbekistan">Uzbekistan</option>
                                                    <option value="Vanuatu">Vanuatu</option>
                                                    <option value="Venezuela">Venezuela</option>
                                                    <option value="Viet Nam">Viet Nam</option>
                                                    <option value="Virgin Islands, British">Virgin Islands, British</option>
                                                    <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                                    <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                    <option value="Western Sahara">Western Sahara</option>
                                                    <option value="Yemen">Yemen</option>
                                                    <option value="Zambia">Zambia</option>
                                                    <option value="Zimbabwe">Zimbabwe</option>
                                                </select>
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">Date of birth</span>
                                                    <span class="ms-1" data-bs-toggle="tooltip"
                                                        title="Enter the contact's name.">
                                                        <i class="ki-duotone ki-information fs-7">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>
                                                    </span>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input wire:model='dob' type="date" class="form-control " name="dob"
                                                    value="" />
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">Marital Status</span>
                                                    <span class="ms-1" data-bs-toggle="tooltip"
                                                        title="Enter the contact's name.">
                                                        <i class="ki-duotone ki-information fs-7">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>
                                                    </span>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select wire:model='marital_status_name' name="marital_status_name" class="form-control" id="">
                                                    <option value="">Select...</option>
                                                    @foreach ($marital_status as $item)
                                                        <option value="{{$item->id}}">{{$item->marital_status_name}}</option>
                                                    @endforeach
                                                </select>
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">Work Station</span>
                                                    <span class="ms-1" data-bs-toggle="tooltip"
                                                        title="Enter the contact's name.">
                                                        <i class="ki-duotone ki-information fs-7">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>
                                                    </span>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select wire:model='work_station' name="work_station" class="form-control" id="">
                                                    <option value="">Select...</option>
                                                </select>
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">Staff Status</span>
                                                    <span class="ms-1" data-bs-toggle="tooltip"
                                                        title="Enter the contact's name.">
                                                        <i class="ki-duotone ki-information fs-7">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>
                                                    </span>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select wire:model='staff_status_name' name="staff_status" class="form-control" id="">
                                                    <option value="">Select ...</option>
                                                    @foreach ($staff_status as $item)
                                                        <option value="{{$item->id}}">{{$item->staff_status_name}}</option>
                                                    @endforeach
                                                </select>
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="mt-5 row">
                                        <div class="col-md-3">
                                            <small class="badge badge-success">Job Information</small>
                                        </div>
                                    </div>
        
        
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">Division</span>
        
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select wire:model='division' name="division" class="form-control" id="division">
                                                    <option value="">Select ...</option>
                                                    <option value="Teaching">Teaching</option>
                                                    <option value="Non Teaching">Non Teaching</option>
                                                </select>
                                                <!--end::Input-->
                                            </div>
                                        </div>
        
                                        <div class="col-md-3">
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">Department</span>
        
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select wire:model='department' id="department"  name="department" class="form-control" id="">
                                                    <option value=""> ...</option>
                                                </select>
                                                <!--end::Input-->
                                            </div>
                                        </div>
        
                                        <div class="col-md-3">
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">Job Title</span>
        
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select wire:model='job_title' name="job_title" class="form-control" id="job_title">
                                                    <option value=""> ... </option>
                                                </select>
                                                <!--end::Input-->
                                            </div>
                                        </div>
        
        
                                        <div class="col-md-3">
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">Job Category</span>
        
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input  wire:model='job_category' type="text" class="form-control" id="job_category" name="job_category" readonly>
                                                <!--end::Input-->
                                            </div>
                                        </div>
        
         
        
                                        <div class="col-md-3">
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">First App Date</span>
        
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input wire:model='first_app_date' type="date" class="form-control" name="first_app_date">
                                                <!--end::Input-->
                                            </div>
                                        </div>
        
                                        <div class="col-md-3">
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">Qualification</span>
        
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select wire:model='qualification' name="qualification" class="form-control" id="">
                                                    <option value=""> Select ... </option>
                                                </select>
                                                <!--end::Input-->
                                            </div>
                                        </div>
        
                                        <div class="col-md-3">
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">Starting Salary</span>
        
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select wire:model='starting_salary' name="starting_salary" class="form-control" id="">
                                                    <option value=""> ... </option>
                                                </select>
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">Monthly Salary</span>
        
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" wire:model='monthly_salary' class="form-control" disabled name="monthly_salary">
                                                <!--end::Input-->
                                            </div>
                                        </div>
        
                                    </div>
        
        
                                    <div class="mt-5 row">
                                        <div class="col-md-3">
                                            <small class="badge badge-success">Contact information</small>
                                        </div>
                                    </div>
        
        
                                    <div class="mt-5 row">
                                        <div class="col-md-3">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Postal Address</span>
        
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input wire:model='postal_address' type="text" class="form-control" name="postal_address">
                                            <!--end::Input-->
        
                                        </div>
        
                                        <div class="col-md-3">
        
        
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">City</span>
        
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input wire:model='city' type="text" class="form-control" name="city">
                                            <!--end::Input-->
        
        
                                        </div>
        
                                        <div class="col-md-3">
        
        
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">City Region</span>
        
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input wire:model='city_region' type="text" class="form-control" name="city_region">
                                            <!--end::Input-->
                                        </div>
        
                                        <div class="col-md-3">
        
        
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Home Town</span>
        
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input wire:model='home_town' type="text" class="form-control" name="home_town">
                                            <!--end::Input-->
                                        </div>
        
                                        <div class="col-md-3">
        
        
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Residential Address</span>
        
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input wire:model='residential_address' type="text" class="form-control" name="residential_address">
                                            <!--end::Input-->
                                        </div>
                                        <div class="col-md-3">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Phone Number</span>
        
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input wire:model='phone_number' type="text" class="form-control" name="phone_number">
                                            <!--end::Input-->
                                        </div>
        
                                        <div class="col-md-3">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Email Address</span>
        
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input wire:model='email' type="email" class="form-control" name="email">
                                            <!--end::Input-->
                                        </div>
        
                                        <div class="col-md-3">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Home Town Region</span>
        
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select class="form-control" wire:model='home_town_region' name="home_town_region" id="">
                                                <option >Select ...</option>
                                                @foreach ($regions as $region)
                                                    <option value="{{$region->region}}">{{$region->region}}</option>
                                                @endforeach
                                            </select>
                                           
                                            <!--end::Input-->
                                        </div>
                                    
                                        <button type="submit" class="mt-5 btn btn-primary submit">Submit</button>
        
                                    </div>
                                </div>
                            </div>

                            <!--end::Input group-->
                            <!--begin::Input group-->
                         
                            <!--end::Action buttons-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Contacts-->
            </div>
        </div>
    </div>
</div>


