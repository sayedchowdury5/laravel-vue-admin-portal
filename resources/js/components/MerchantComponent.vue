<template>
    <div class="container mt-5">
        <div class="d-flex">
            <div class="dropdown">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">Status</button>
                <div class="dropdown-menu">
                <p class="dropdown-item" id="active" style="cursor: pointer;">Active</p>
                <p class="dropdown-item" id="deactive" style="cursor: pointer;">Deactive</p>
                <!-- <a class="dropdown-item" href="#" >Deactive</a> -->
                </div>
            </div>
            <button class="btn btn-secondary ml-2">Calendar</button>
        </div>
        <div class="d-flex justify-content-end">
            <Button class="btn btn-success mb-5" data-toggle="modal" data-target="#addPostModal">Create Merchant</Button>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="brandTable" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Merchant</th>
                                <th>Shop</th>
                                <th>Mall</th>
                                <th>Country</th>
                                <th>City</th>
                                <th>Activation</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for='item in list.data' :key='item.id'>
                                <td>{{item.id}}</td>
                                <td><img :src="'/storage/app/'+item.image" alt="image"></td>
                                <td>{{item.merchant_name}}</td>
                                <td></td>
                                <td></td>
                                <td>{{item.country}}</td>
                                <td>{{item.city}}</td>
                                <td>{{item.activation}}</td>
                                <td>
                                    <a class="btn btn-primary" href="#editPostModal" data-toggle="modal" @click="editPost(item.id);">View / Edit</a>
                                    <button class="btn text-white" :style="[item.activation == 1 ? {'background-color' : 'green'} : {'background-color' : 'red'}]" onclick="confirm('Confirm want to change activation?') || event.stopImmediatePropagation()" @click="activation(item.id);">Active / Deactive</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end">
                    <!-- <pagination :data="list" @pagination-change-page="getResults"></pagination> -->
                </div>
            </div>
        </div>
        <!-- Add New Merchant Modal -->
        <div class="modal fade" id="addPostModal">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Create Merchant</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div>
                            <input type="file" id="file" ref="file" v-on:change="handleFileUpload()"/>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 mt-3">Merchant Name</div>
                            <div class="col-sm-9 mt-3">
                                <input type="text" class="form-control" v-model="add.merchant_name">
                            </div>
                            <div class="col-sm-3 mt-3">SSM Register No</div>
                            <div class="col-sm-9 mt-3">
                                <input type="text" class="form-control" v-model="add.ssm_no">
                            </div>
                            <div class="col-sm-3 mt-3">Primary Contact Number</div>
                            <div class="col-sm-9 mt-3">
                                <input type="text" class="form-control" v-model="add.primary_contact_no">
                            </div>
                            <div class="col-sm-3 mt-3">Secondary Contact Number</div>
                            <div class="col-sm-9 mt-3">
                                <input type="text" class="form-control" v-model="add.secondary_contact_no">
                            </div>
                            <div class="col-sm-3 mt-2">Email Address</div>
                            <div class="col-sm-9 mt-2">
                                <input type="email" class="form-control" v-model="add.email">
                            </div>
                            <div class="col-sm-3 mt-3">Address</div>
                            <div class="col-sm-9 mt-3">
                                <textarea class="form-control" rows="5" v-model="add.address"></textarea>
                            </div>
                            <div class="col-sm-3 mt-3">Zip/Postcode</div>
                            <div class="col-sm-9 mt-3">
                                <input type="text" class="form-control" v-model="add.zip_code">
                            </div>
                            <div class="col-sm-3 mt-3">Country</div>
                            <div class="col-sm-9 mt-3">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.country">
                                        <option>Malaysia</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">State</div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.state">
                                        <option>Kuala Lumpur</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">City</div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.city">
                                        <option>Setapak</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">Bank Name</div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.bank_name">
                                        <option>RHB</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">Account No</div>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" v-model="add.bank_acc_no">
                            </div>
                            <div class="col-sm-3 mt-3">Activation</div>
                            <div class="col-sm-9 mt-3">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="addradio" v-bind:value="1" v-model="add.activation">Yes
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="addradio" v-bind:value="0" v-model="add.activation">No
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" @click="addPost()">Submit</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Merchant Modal -->
        <div class="modal fade" id="editPostModal">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Edit Merchant</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-3 mt-3">Merchant Name</div>
                            <div class="col-sm-9 mt-3">
                                <input type="text" class="form-control" v-model="add.merchant_name">
                            </div>
                            <div class="col-sm-3 mt-3">SSM Register No</div>
                            <div class="col-sm-9 mt-3">
                                <input type="text" class="form-control" v-model="add.ssm_no">
                            </div>
                            <div class="col-sm-3 mt-3">Primary Contact Number</div>
                            <div class="col-sm-9 mt-3">
                                <input type="text" class="form-control" v-model="add.primary_contact_no">
                            </div>
                            <div class="col-sm-3 mt-3">Secondary Contact Number</div>
                            <div class="col-sm-9 mt-3">
                                <input type="text" class="form-control" v-model="add.secondary_contact_no">
                            </div>
                            <div class="col-sm-3 mt-2">Email Address</div>
                            <div class="col-sm-9 mt-2">
                                <input type="email" class="form-control" v-model="add.email">
                            </div>
                            <div class="col-sm-3 mt-3">Address</div>
                            <div class="col-sm-9 mt-3">
                                <textarea class="form-control" rows="5" v-model="add.address"></textarea>
                            </div>
                            <div class="col-sm-3 mt-3">Zip/Postcode</div>
                            <div class="col-sm-9 mt-3">
                                <input type="text" class="form-control" v-model="add.zip_code">
                            </div>
                            <div class="col-sm-3 mt-3">Country</div>
                            <div class="col-sm-9 mt-3">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.country">
                                        <option>Malaysia</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">State</div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.state">
                                        <option>Kuala Lumpur</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">City</div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.city">
                                        <option>Setapak</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">Bank Name</div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.bank_name">
                                        <option>RHB</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">Account No</div>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" v-model="add.bank_acc_no">
                            </div>
                            <div class="col-sm-3 mt-3">Activation</div>
                            <div class="col-sm-9 mt-3">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="addradio" v-bind:value="1" v-model="add.activation">Yes
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="addradio" v-bind:value="0" v-model="add.activation">No
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" @click="updatePost()">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.');
            this.fetchMerchant();
            //this.getResults(); //pagination result
        },
        data(){
            return {
                list:{},
                add: {
                    id: "",
                    file:"",
                    merchant_name: "",
                    ssm_no: "",
                    primary_contact_no: "",
                    secondary_contact_no: "",
                    email: "",
                    address:"",
                    zip_code:"",
                    country:"",
                    state:"",
                    city:"",
                    bank_name:"",
                    bank_acc_no:"",
                    activation:""
                },
            }
        },
        methods:{

            fetchMerchant(){
                axios.get('http://localhost:8000/api/merchants')
                .then(res => {
                    this.list = res.data;
                }).then(res => {
                    $("#brandTable").DataTable({
                        //"dom":'<"row"<"col-sm-12"B>flrtip<"clear">',
                        "dom": 'Bflrtip<"clear">',
                        "buttons": [
                            //{extend: 'copy'},
                            {
                                extend: 'csv',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                                }
                            },
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                                }
                            },
                            {extend: 'excel', title: 'ExampleFile'},
                            {extend: 'pdf', title: 'ExampleFile'}
                        ],

                        // buttons: [
                        //     'copyHtml5',
                        //     'excelHtml5',
                        //     'csvHtml5',
                        //     'pdfHtml5'
                        // ],

                        //"buttons": ['copy', 'csv', 'excel', 'pdf', 'print'],
                        "order": [[ 0, "desc" ]],
                        "deferRender": true,
                        //"lengthMenu": [ 25, 50, 75, 100 ],
                        //"scrollX": true,
                        //"scrollY": '50vh',
                        //"scrollCollapse": true,
                        //filter onclick any data in the column
                        "columnDefs": [
                            //{ "searchable": false, "targets": 5 },
                            { "visible": false, "targets": 7 }
                        ],
                        //filter by click any column
                        // "initComplete": function () {
                        //     var api = this.api();
                        //     api.$('td').click( function () {
                        //         api.search( this.innerHTML ).draw();
                        //     } );
                        // }
                        //filter by select option for each column
                        // initComplete: function () {
                        //     this.api().columns().every( function () {
                        //         var column = this;
                        //         var select = $('<select><option value=""></option></select>')
                        //             .appendTo( $(column.footer()).empty() )
                        //             .on( 'change', function () {
                        //                 var val = $.fn.dataTable.util.escapeRegex(
                        //                     $(this).val()
                        //                 );
                        //
                        //                 column
                        //                     .search( val ? '^'+val+'$' : '', true, false )
                        //                     .draw();
                        //             } );
                        //
                        //         column.data().unique().sort().each( function ( d, j ) {
                        //             select.append( '<option value="'+d+'">'+d+'</option>' )
                        //         } );
                        //     } );
                        // }
                    });
                    var table = $('#brandTable').DataTable();
                    $('#active').on('click', function () {
                      table
                        .column( 7 )
                        .search(1)
                        //.search('sayed|Science', true, false)
                        .draw();
                    });
                    $('#deactive').on('click', function () {
                      table
                        .column( 7 )
                        .search(0)
                        //.search('sayed|Science', true, false)
                        .draw();
                    });
                }).catch(err => {console.log(err);});
            },
            // getResults(page = 1) {
			// axios.get('http://localhost:8000/api/floors?page=' + page)
			// 	.then(response => {
			// 		this.list = response.data;
			// 	});
            // },

            //Handles a change on the file upload
            handleFileUpload(){
                this.add.file = this.$refs.file.files[0];
            },

            addPost(){
                if(this.add.file == '' || this.add.merchant_name == '' || this.add.ssm_no == '' || this.add.primary_contact_no == '' || this.add.email == '' || this.add.address == '' || this.add.zip_code == '' || this.add.country == '' || this.add.state == '' || this.add.city == '' || this.add.bank_name == '' || this.add.bank_acc_no == ''){
                    return alert("Please fill-up all the fields");
                }

                let formData = new FormData();
                formData.append('image', this.add.file);
                formData.append('merchant_name', this.add.merchant_name);
                formData.append('ssm_no', this.add.ssm_no);
                formData.append('primary_contact_no', this.add.primary_contact_no);
                formData.append('email', this.add.email);
                formData.append('address', this.add.address);
                formData.append('zip_code', this.add.zip_code);
                formData.append('country', this.add.country);
                formData.append('state', this.add.state);
                formData.append('city', this.add.city);
                formData.append('bank_name', this.add.bank_name);
                formData.append('bank_acc_no', this.add.bank_acc_no);
                formData.append('activation', this.add.activation);

                axios.post('http://localhost:8000/api/create_merchant', formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                ).then(res => {
                    if(res.status == 201){
                        location.reload();
                    }
                }).catch(error => {console.log(error);});
            },
            editPost(id){
                axios.get('http://localhost:8000/api/single_merchant/'+id)
                .then(res => {
                    this.add.id = res.data.data.id,
                    this.add.merchant_name = res.data.data.merchant_name,
                    this.add.ssm_no = res.data.data.ssm_no,
                    this.add.primary_contact_no = res.data.data.primary_contact_no,
                    this.add.secondary_contact_no = res.data.data.secondary_contact_no,
                    this.add.email = res.data.data.email,
                    this.add.address = res.data.data.address,
                    this.add.zip_code = res.data.data.zip_code,
                    this.add.country = res.data.data.country,
                    this.add.state = res.data.data.state,
                    this.add.city = res.data.data.city,
                    this.add.bank_name = res.data.data.bank_name,
                    this.add.bank_acc_no = res.data.data.bank_acc_no,
                    this.add.activation = res.data.data.activation
                    //this.add.floor = res.data.data.floor
                }).catch(error => {console.log(error);});
            },
            updatePost(){
                axios.put('http://localhost:8000/api/update_merchant/' + this.add.id, this.add)
                .then(res => {
                    if(res.status == 200){
                        location.reload();
                    }
                }).catch(err => {console.log(err);});
            },
            activation(id){
                let activationCode;
                let merchant_name;
                let ssm_no;
                let primary_contact_no;
                let secondary_contact_no;
                let email;
                let address;
                let zip_code;
                let country;
                let state;
                let city;
                let bank_name;
                let bank_acc_no;
                axios.get('http://localhost:8000/api/single_merchant/'+id)
                .then(res => {
                    //console.log("Response = "+res.data.data.activation);
                    merchant_name = res.data.data.merchant_name;
                    ssm_no = res.data.data.ssm_no;
                    primary_contact_no = res.data.data.primary_contact_no;
                    secondary_contact_no = res.data.data.secondary_contact_no;
                    email = res.data.data.email;
                    address = res.data.data.address;
                    zip_code = res.data.data.zip_code;
                    country = res.data.data.country;
                    state = res.data.data.state;
                    city = res.data.data.city;
                    bank_name = res.data.data.bank_name;
                    bank_acc_no = res.data.data.bank_acc_no;

                    if(res.data.data.activation == 1){
                        activationCode = 0;
                        //console.log("Active Code = "+activationCode);
                    }else{
                        if(res.data.data.activation == 0){
                            activationCode = 1;
                            //console.log("Active Code = "+activationCode);
                        }
                    }
                })
                .then(res => {
                    axios.put('http://localhost:8000/api/update_merchant/' + id, {merchant_name:merchant_name, ssm_no:ssm_no, primary_contact_no:primary_contact_no, secondary_contact_no:secondary_contact_no, email:email, address:address, zip_code:zip_code, country:country, state:state, city:city, bank_name:bank_name, bank_acc_no:bank_acc_no, activation: activationCode}).then(res => {location.reload();}).catch(err => {console.log("Error = "+err);})
                }).catch(err => {console.log("Error = "+err);})
                .catch(err => {console.log("Error = "+err);})
            },
            deletePost(id){
                axios.delete('http://localhost:8000/api/merchants/'+id)
                .then(res => {
                    console.log("deleted", res.data);
                }).catch(err => {console.log(err);});
            }
        }
    }
</script>
