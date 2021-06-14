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
            <Button class="btn btn-success mb-5" data-toggle="modal" data-target="#addPostModal">Create Mall</Button>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="mallTable" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Mall</th>
                                <th>Contact Person</th>
                                <th>Contact Number</th>
                                <th>Email Address</th>
                                <th>Merchant</th>
                                <th>Shop</th>
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
                                <td>{{item.mall_name}}</td>
                                <td>{{item.contact_person}}</td>
                                <td>{{item.contact_number}}</td>
                                <td>{{item.email_address}}</td>
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
        <!-- Add New Mall Modal -->
        <div class="modal fade" id="addPostModal">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Create Mall</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div>
                            <input type="file" id="file" ref="file" v-on:change="handleFileUpload()"/>
                        </div>
                        <div class="row mt-5">
                            <div class="col-sm-2">Mall</div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" v-model="add.mall_name">
                            </div>
                            <div class="col-sm-2 mt-3">Contact Person</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="add.contact_person">
                            </div>
                            <div class="col-sm-2 mt-3">Contact Number</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="add.contact_number">
                            </div>
                            <div class="col-sm-2 mt-3">Email Address</div>
                            <div class="col-sm-10 mt-3">
                                <input type="email" class="form-control" v-model="add.email_address">
                            </div>
                            <div class="col-sm-2 mt-3">Address</div>
                            <div class="col-sm-10 mt-3">
                                <textarea class="form-control" rows="5" v-model="add.address"></textarea>
                            </div>
                            <div class="col-sm-2 mt-3">Zip Code</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="add.zip_code">
                            </div>
                            <div class="col-sm-2 mt-3">County</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="add.country">
                            </div>
                            <div class="col-sm-2 mt-3">City</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="add.city">
                            </div>
                            <div class="col-sm-2 mt-3">Activation</div>
                            <div class="col-sm-10 mt-3">
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

        <!-- Edit Post Modal -->
        <div class="modal fade" id="editPostModal">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Edit Floor</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-2">Mall</div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" v-model="add.mall_name">
                            </div>
                            <div class="col-sm-2 mt-3">Contact Person</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="add.contact_person">
                            </div>
                            <div class="col-sm-2 mt-3">Contact Number</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="add.contact_number">
                            </div>
                            <div class="col-sm-2 mt-3">Email Address</div>
                            <div class="col-sm-10 mt-3">
                                <input type="email" class="form-control" v-model="add.email_address">
                            </div>
                            <div class="col-sm-2 mt-3">Address</div>
                            <div class="col-sm-10 mt-3">
                                <textarea class="form-control" rows="5" v-model="add.address"></textarea>
                            </div>
                            <div class="col-sm-2 mt-3">Zip Code</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="add.zip_code">
                            </div>
                            <div class="col-sm-2 mt-3">County</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="add.country">
                            </div>
                            <div class="col-sm-2 mt-3">City</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="add.city">
                            </div>
                            <div class="col-sm-2 mt-3">Activation</div>
                            <div class="col-sm-10 mt-3">
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
            this.fetchMall();
            //this.getResults(); //pagination result
        },
        data(){
            return {
                list:{},
                add: {
                    id: "",
                    file:"",
                    mall_name: "",
                    contact_person: "",
                    contact_number:"",
                    email_address:"",
                    address:"",
                    zip_code:"",
                    country:"",
                    city:"",
                    activation: ""
                },
            }
        },
        methods:{
            fetchMall(){
                axios.get('http://localhost:8000/api/malls')
                .then(res => {
                    this.list = res.data;
                }).then(res => {
                    $("#mallTable").DataTable({
                        //"dom":'<"row"<"col-sm-12"B>flrtip<"clear">',
                        "dom": 'Bflrtip<"clear">',
                        "buttons": [
                            //{extend: 'copy'},
                            {
                                extend: 'csv',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 ]
                                }
                            },
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 ]
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
                            { "visible": false, "targets": 10 }
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
                    var table = $('#mallTable').DataTable();
                    $('#active').on('click', function () {
                      table
                        .column( 10 )
                        .search(1)
                        //.search('sayed|Science', true, false)
                        .draw();
                    });
                    $('#deactive').on('click', function () {
                      table
                        .column( 10 )
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
                if(this.add.file == '' || this.add.mall_name == '' || this.add.contact_person == '' || this.add.contact_number == '' || this.add.email_address == '' || this.add.address == '' || this.add.zip_code == '' || this.add.country == '' || this.add.city == ''){
                    return alert("Please fill-up all the fields");
                }

                let formData = new FormData();
                formData.append('image', this.add.file);
                formData.append('mall_name', this.add.mall_name);
                formData.append('contact_person', this.add.contact_person);
                formData.append('contact_number', this.add.contact_number);
                formData.append('email_address', this.add.email_address);
                formData.append('address', this.add.address);
                formData.append('zip_code', this.add.zip_code);
                formData.append('country', this.add.country);
                formData.append('city', this.add.city);
                formData.append('activation', this.add.activation);

                axios.post('http://localhost:8000/api/create_mall', formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                ).then(res => {
                    if(res.status == 201){
                        location.reload();
                    }
                }).catch(error => {console.log(error); });
            },
            editPost(id){
                axios.get('http://localhost:8000/api/single_mall/'+id)
                .then(res => {
                    this.add.id = res.data.data.id,
                    this.add.mall_name = res.data.data.mall_name,
                    this.add.contact_person = res.data.data.contact_person,
                    this.add.contact_number = res.data.data.contact_number,
                    this.add.email_address = res.data.data.email_address,
                    this.add.address = res.data.data.address,
                    this.add.zip_code = res.data.data.zip_code,
                    this.add.country = res.data.data.country,
                    this.add.city = res.data.data.city,
                    this.add.activation = res.data.data.activation
                }).catch(error => {console.log(error);});
            },
            updatePost(){
                axios.put('http://localhost:8000/api/update_mall/' + this.add.id, this.add)
                .then(res => {
                    if(res.status == 200){
                        location.reload();
                    }
                }).catch(err => {console.log(err);});
            },
            activation(id){
                let activationCode;
                let mall_name;
                let contact_person;
                let contact_number;
                let email_address;
                let address;
                let zip_code;
                let country;
                let city;
                axios.get('http://localhost:8000/api/single_mall/'+id)
                .then(res => {
                    //console.log("Response = "+res.data.data.activation);
                    mall_name = res.data.data.mall_name;
                    contact_person = res.data.data.contact_person;
                    contact_number = res.data.data.contact_number;
                    email_address = res.data.data.email_address;
                    address = res.data.data.address;
                    zip_code = res.data.data.zip_code;
                    country = res.data.data.country;
                    city = res.data.data.city;

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
                    axios.put('http://localhost:8000/api/update_mall/' + id, {mall_name:mall_name, contact_person:contact_person, contact_number:contact_number, email_address:email_address, address:address, zip_code:zip_code, country:country, city:city, activation: activationCode}).then(res => {location.reload();}).catch(err => {console.log("Error = "+err);})
                }).catch(err => {console.log("Error = "+err);})
                .catch(err => {console.log("Error = "+err);})
            },
            deletePost(id){
                console.log(id);
                axios.delete('http://localhost:8000/api/malls/'+id)
                .then(res => {
                    console.log("deleted", res.data);
                }).catch(err => {console.log(err); });
            }
        }
    }
</script>
