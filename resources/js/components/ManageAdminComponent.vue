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
            <Button class="btn btn-success mb-5" data-toggle="modal" data-target="#addPostModal">Create Admin</Button>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="manageAdminTable" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Phone Number</th>
                                <th>Level</th>
                                <th>Activation</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for='item in list.data' :key='item.id'>
                                <td>{{item.id}}</td>
                                <td><img :src="'/storage/app/'+item.image" alt="image"></td>
                                <td>{{item.name}}</td>
                                <td>{{item.phone_no}}</td>
                                <td></td>
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
        <!-- Add New Admin Modal -->
        <div class="modal fade" id="addPostModal">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Create Admin</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div>
                            <input type="file" id="file" ref="file" v-on:change="handleFileUpload()"/>
                        </div>
                        <div class="row mt-5">
                            <div class="col-sm-2"> Name</div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" v-model="add.name">
                            </div>
                            <div class="col-sm-2 mt-3">Phone Number</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="add.phone_no">
                            </div>
                            <div class="col-sm-2 mt-3">Email</div>
                            <div class="col-sm-10 mt-3">
                                <input type="email" class="form-control" v-model="add.email">
                            </div>
                            <div class="col-sm-2 mt-3">Password</div>
                            <div class="col-sm-10 mt-3">
                                <input type="password" class="form-control" v-model="add.password">
                            </div>
                            <div class="col-sm-2 mt-3">Activation</div>
                            <div class="col-sm-10 mt-3">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" v-bind:value="1" v-model="add.activation">Yes
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" v-bind:value="0" v-model="add.activation">No
                                    </label>
                                </div>
                            </div><hr>
                            <div class="col-sm-12 mt-5">
                                <div><h5><strong>Authentication Access</strong></h5></div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" v-bind:value="1" v-model="add.dashboard">Dashboard
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" v-bind:value="1" v-model="add.floor">Floor
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" v-bind:value="1" v-model="add.product">Product
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" v-bind:value="1" v-model="add.merchant">Merchant
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" v-bind:value="1" v-model="add.customer">Customer
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" v-bind:value="1" v-model="add.stock">Stock
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" v-bind:value="1" v-model="add.voucher">Voucher
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" v-bind:value="1" v-model="add.advertisement">Advertisement
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" v-bind:value="1" v-model="add.promotion">Promotion / Updates
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" v-bind:value="1" v-model="add.manage_admin">Manage Admin
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" v-bind:value="1" v-model="add.setting">Setting
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" v-bind:value="1" v-model="add.mall">Mall
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" v-bind:value="1" v-model="add.sales">Sales
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" v-bind:value="1" v-model="add.transaction">Transaction
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" v-bind:value="1" v-model="add.reports">Reports
                                            </label>
                                        </div>
                                    </div>
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

        <!-- Edit Admin Modal -->
        <div class="modal fade" id="editPostModal">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Edit Admin</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div>
                            <input type="file" id="file" ref="file" v-on:change="handleFileUpload()"/>
                        </div>
                        <div class="row mt-5">
                            <div class="col-sm-2"> Name</div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" v-model="add.name">
                            </div>
                            <div class="col-sm-2 mt-3">Phone Number</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="add.phone_no">
                            </div>
                            <div class="col-sm-2 mt-3">Email</div>
                            <div class="col-sm-10 mt-3">
                                <input type="email" class="form-control" v-model="add.email">
                            </div>
                            <div class="col-sm-2 mt-3">Password</div>
                            <div class="col-sm-10 mt-3">
                                <input type="password" class="form-control" v-model="add.password">
                            </div>
                            <div class="col-sm-2 mt-3">Activation</div>
                            <div class="col-sm-10 mt-3">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" v-bind:value="1" v-model="add.activation">Yes
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" v-bind:value="0" v-model="add.activation">No
                                    </label>
                                </div>
                            </div><hr>
                            <div class="col-sm-12 mt-5">
                                <div><h5><strong>Authentication Access</strong></h5></div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" v-bind:value="1" v-model="add.dashboard">Dashboard
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" v-bind:value="1" v-model="add.floor">Floor
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" v-bind:value="1" v-model="add.product">Product
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" v-bind:value="1" v-model="add.merchant">Merchant
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" v-bind:value="1" v-model="add.customer">Customer
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" v-bind:value="1" v-model="add.stock">Stock
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" v-bind:value="1" v-model="add.voucher">Voucher
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" v-bind:value="1" v-model="add.advertisement">Advertisement
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" v-bind:value="1" v-model="add.promotion">Promotion / Updates
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" v-bind:value="1" v-model="add.manage_admin">Manage Admin
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" v-bind:value="1" v-model="add.setting">Setting
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" v-bind:value="1" v-model="add.mall">Mall
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" v-bind:value="1" v-model="add.sales">Sales
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" v-bind:value="1" v-model="add.transaction">Transaction
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" v-bind:value="1" v-model="add.reports">Reports
                                            </label>
                                        </div>
                                    </div>
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
            this.fetchAdmin();
            //this.getResults(); //pagination result
        },
        data(){
            return {
                list:{},
                add: {
                    id: "",
                    file:"",
                    name: "",
                    phone_no: "",
                    email: "",
                    password: "",
                    activation: "",
                    dashboard: "",
                    floor: "",
                    merchant: "",
                    product: "",
                    customer: "",
                    stock: "",
                    voucher: "",
                    advertisement: "",
                    promotion: "",
                    manage_admin: "",
                    setting: "",
                    mall: "",
                    sales: "",
                    transaction: "",
                    reports: "",
                },
            }
        },
        methods:{
            fetchAdmin(){
                axios.get('http://localhost:8000/api/admins')
                .then(res => {
                    this.list = res.data;
                }).then(res => {
                    $("#manageAdminTable").DataTable({
                        //"dom":'<"row"<"col-sm-12"B>flrtip<"clear">',
                        "dom": 'Bflrtip<"clear">',
                        "buttons": [
                            //{extend: 'copy'},
                            {
                                extend: 'csv',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4 ]
                                }
                            },
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4 ]
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
                            { "visible": false, "targets": 5 }
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
                    var table = $('#manageAdminTable').DataTable();
                    $('#active').on('click', function () {
                      table
                        .column( 5 )
                        .search(1)
                        //.search('sayed|Science', true, false)
                        .draw();
                    });
                    $('#deactive').on('click', function () {
                      table
                        .column( 5 )
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
                //console.log(this.add.dashboard);
                if( this.add.name == '' || this.add.phone_no == '' || this.add.email == '' || this.add.password == ''){
                    return alert("Please fill-up all the fields");
                }

                let formData = new FormData();
                //formData.append('image', this.add.file);
                formData.append('name', this.add.name);
                formData.append('phone_no', this.add.phone_no);
                formData.append('email', this.add.email);
                formData.append('password', this.add.password);
                formData.append('activation', this.add.activation);
                formData.append('dashboard', this.add.dashboard);
                formData.append('floor', this.add.floor);
                formData.append('merchant', this.add.merchant);
                formData.append('product', this.add.product);
                formData.append('customer', this.add.customer);
                formData.append('stock', this.add.stock);
                formData.append('voucher', this.add.voucher);
                formData.append('advertisement', this.add.advertisement);
                formData.append('promotion', this.add.promotion);
                formData.append('manage_admin', this.add.manage_admin);
                formData.append('setting', this.add.setting);
                formData.append('mall', this.add.mall);
                formData.append('sales', this.add.sales);
                formData.append('transaction', this.add.transaction);
                formData.append('reports', this.add.reports);

                axios.post('http://localhost:8000/api/create_admin', formData,
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
                axios.get('http://localhost:8000/api/single_admin/'+id)
                .then(res => {
                    this.add.id = res.data.data.id,
                    this.add.name = res.data.data.name,
                    this.add.phone_no = res.data.data.phone_no,
                    this.add.email = res.data.data.email,
                    this.add.password = res.data.data.password,
                    this.add.activation = res.data.data.activation,
                    this.add.dashboard = res.data.data.dashboard,
                    this.add.floor = res.data.data.floor,
                    this.add.merchant = res.data.data.merchant,
                    this.add.product = res.data.data.product,
                    this.add.customer = res.data.data.customer,
                    this.add.stock = res.data.data.stock,
                    this.add.voucher = res.data.data.voucher,
                    this.add.advertisement = res.data.data.advertisement,
                    this.add.promotion = res.data.data.promotion,
                    this.add.manage_admin = res.data.data.manage_admin,
                    this.add.setting = res.data.data.setting,
                    this.add.mall = res.data.data.mall,
                    this.add.sales = res.data.data.sales,
                    this.add.transaction = res.data.data.transaction,
                    this.add.reports = res.data.data.reports

                }).catch(error => {console.log(error);});
            },
            updatePost(){
                axios.put('http://localhost:8000/api/update_admin/' + this.add.id, this.add)
                .then(res => {
                    if(res.status == 200){
                        location.reload();
                    }
                }).catch(err => {console.log(err);});
            },
            activation(id){
                let activationCode;
                let name;
                let phone_no;
                let email;
                let password;
                let dashboard;
                let floor;
                let merchant;
                let product;
                let customer;
                let stock;
                let voucher;
                let advertisement;
                let promotion;
                let manage_admin;
                let setting;
                let mall;
                let sales;
                let transaction;
                let reports;
                axios.get('http://localhost:8000/api/single_admin/'+id)
                .then(res => {
                    //console.log("Response = "+res.data.data.activation);
                    name = res.data.data.name;
                    phone_no = res.data.data.phone_no;
                    email = res.data.data.email;
                    password = res.data.data.password;
                    dashboard = res.data.data.dashboard;
                    floor = res.data.data.floor;
                    merchant = res.data.data.merchant;
                    product = res.data.data.product;
                    customer = res.data.data.customer;
                    stock = res.data.data.stock;
                    voucher = res.data.data.voucher;
                    advertisement = res.data.data.advertisement;
                    promotion = res.data.data.promotion;
                    manage_admin = res.data.data.manage_admin;
                    setting = res.data.data.setting;
                    mall = res.data.data.mall;
                    sales = res.data.data.sales;
                    transaction = res.data.data.transaction;
                    reports = res.data.data.reports;

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
                    axios.put('http://localhost:8000/api/update_admin/' + id, {name:name, phone_no:phone_no, email:email, password:password, dashboard:dashboard, floor:floor, merchant:merchant, product:product, customer:customer, stock:stock, voucher:voucher, advertisement:advertisement, promotion:promotion, manage_admin:manage_admin, setting:setting, mall:mall, sales:sales, transaction:transaction, reports:reports, activation: activationCode}).then(res => {location.reload();}).catch(err => {console.log("Error = "+err);})
                }).catch(err => {console.log("Error = "+err);})
                .catch(err => {console.log("Error = "+err);})
            },
            deletePost(id){
                console.log(id);
                axios.delete('http://localhost:8000/api/admins/'+id)
                .then(res => {
                    console.log("deleted", res.data);
                }).catch(err => {console.log(err); });
            }
        }
    }
</script>
