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
            <Button class="btn btn-success mb-5" data-toggle="modal" data-target="#addPostModal">Create Promotion/Update</Button>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="promotionUpdateTable" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Brand</th>
                                <th>Sub Brand</th>
                                <th>Promotion Caption</th>
                                <th>Promotion By</th>
                                <th>Start Date</th>
                                <th>Expiry Date</th>
                                <th>Duration (days)</th>
                                <th>Activation</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for='item in list.data' :key='item.id'>
                                <td>{{item.id}}</td>
                                <td><img :src="'/storage/app/'+item.image" alt="image"></td>
                                <td>{{item.brand}}</td>
                                <td>{{item.sub_brand}}</td>
                                <td>{{item.promotion_title}}</td>
                                <td>{{item.promotion_by}}</td>
                                <td>{{item.start_date}}</td>
                                <td>{{item.end_date}}</td>
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
        <!-- Add New Promotion Modal -->
        <div class="modal fade" id="addPostModal">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Create Promotion / Updates</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div>
                            <input type="file" id="file" ref="file" v-on:change="handleFileUpload()"/>
                        </div>
                        <div class="row mt-5">
                            <div class="col-sm-2">Promotion Caption</div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" v-model="add.promotion_title">
                            </div>
                            <div class="col-sm-2 mt-3">Description</div>
                            <div class="col-sm-10 mt-3">
                                <textarea class="form-control" rows="5" v-model="add.description"></textarea>
                            </div>
                            <div class="col-sm-2 mt-3">Start Date</div>
                            <div class="col-sm-10 mt-3">
                                <input type="date" class="form-control" v-model="add.start_date">
                            </div>
                            <div class="col-sm-2 mt-3">End Date</div>
                            <div class="col-sm-10 mt-3">
                                <input type="date" class="form-control" v-model="add.end_date">
                            </div>
                            <div class="col-sm-2 mt-3">Url</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="add.url">
                            </div>
                            <div class="col-sm-2 mt-3">Merchant</div>
                            <div class="col-sm-10 mt-3">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.merchant">
                                        <option v-for="(merchant, index) in merchants" :key="index" v-bind:value="merchant.id">{{ merchant.merchant_name }}---{{ merchant.id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2 mt-3">Shop</div>
                            <div class="col-sm-10 mt-3">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.shop">
                                        <option v-for="(shop, index) in shops" :key="index" v-bind:value="shop.id">{{ shop.shop_name }}---{{ shop.id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2 mt-3">Mall</div>
                            <div class="col-sm-10 mt-3">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.mall">
                                        <option v-for="(mall, index) in malls" :key="index" v-bind:value="mall.id">{{ mall.mall_name }}---{{ mall.id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2 mt-3">Brand</div>
                            <div class="col-sm-10 mt-3">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.brand">
                                        <option v-for="(brand, index) in brands" :key="index" v-bind:value="brand.id">{{ brand.brand }}---{{ brand.id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2 mt-3">Sub Brand</div>
                            <div class="col-sm-10 mt-3">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.sub_brand">
                                        <option v-for="(sub_brand, index) in sub_brands" :key="index" v-bind:value="sub_brand.id">{{ sub_brand.sub_brand }}---{{ sub_brand.id }}</option>
                                    </select>
                                </div>
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
                            <div class="col-sm-12 mt-5">
                                <div><h5><strong>Promotion By</strong></h5></div>
                                <!-- <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input"  value="1" v-model="add.promotion_by" @change="uniqueCheck">GSM
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" value="2" v-model="add.promotion_by" @change="uniqueCheck">Merchant
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" value="3" v-model="add.promotion_by" @change="uniqueCheck">By Other Mall
                                    </label>
                                </div> -->
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input"  :value="1" v-model="add.promotion_by">GSM
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" :value="2" v-model="add.promotion_by">Merchant
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" :value="3" v-model="add.promotion_by">By Other Mall
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
                    <h4 class="modal-title">Edit Promotion / Updates</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div>
                            <input type="file" id="file" ref="file" v-on:change="handleFileUpload()"/>
                        </div>
                        <div class="row mt-5">
                            <div class="col-sm-2">Promotion Caption</div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" v-model="add.promotion_title">
                            </div>
                            <div class="col-sm-2 mt-3">Description</div>
                            <div class="col-sm-10 mt-3">
                                <textarea class="form-control" rows="5" v-model="add.description"></textarea>
                            </div>
                            <div class="col-sm-2 mt-3">Start Date</div>
                            <div class="col-sm-10 mt-3">
                                <input type="date" class="form-control" v-model="add.start_date">
                            </div>
                            <div class="col-sm-2 mt-3">End Date</div>
                            <div class="col-sm-10 mt-3">
                                <input type="date" class="form-control" v-model="add.end_date">
                            </div>
                            <div class="col-sm-2 mt-3">Url</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="add.url">
                            </div>
                            <div class="col-sm-2 mt-3">Merchant</div>
                            <div class="col-sm-10 mt-3">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.merchant">
                                        <option v-for="(merchant, index) in merchants" :key="index" v-bind:value="merchant.id">{{ merchant.merchant_name }}---{{ merchant.id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2 mt-3">Shop</div>
                            <div class="col-sm-10 mt-3">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.shop">
                                        <option v-for="(shop, index) in shops" :key="index" v-bind:value="shop.id">{{ shop.shop_name }}---{{ shop.id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2 mt-3">Mall</div>
                            <div class="col-sm-10 mt-3">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.mall">
                                        <option v-for="(mall, index) in malls" :key="index" v-bind:value="mall.id">{{ mall.mall_name }}---{{ mall.id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2 mt-3">Brand</div>
                            <div class="col-sm-10 mt-3">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.brand">
                                        <option v-for="(brand, index) in brands" :key="index" v-bind:value="brand.id">{{ brand.brand }}---{{ brand.id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2 mt-3">Sub Brand</div>
                            <div class="col-sm-10 mt-3">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.sub_brand">
                                        <option v-for="(sub_brand, index) in sub_brands" :key="index" v-bind:value="sub_brand.id">{{ sub_brand.sub_brand }}---{{ sub_brand.id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2 mt-3">Activation</div>
                            <div class="col-sm-10 mt-3">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input"  v-bind:value="1" v-model="add.activation">Yes
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input"  v-bind:value="0" v-model="add.activation">No
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-12 mt-5">
                                <div><h5><strong>Promotion By</strong></h5></div>
                                <!-- <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input"  value="1" v-model="add.promotion_by" @change="uniqueCheck">GSM
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" value="2" v-model="add.promotion_by" @change="uniqueCheck">Merchant
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" value="3" v-model="add.promotion_by" @change="uniqueCheck">By Other Mall
                                    </label>
                                </div> -->
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input"  :value="1" v-model="add.promotion_by">GSM
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" :value="2" v-model="add.promotion_by">Merchant
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" :value="3" v-model="add.promotion_by">By Other Mall
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
            this.fetchPromotionUpdate();
            this.fetchNewShop();
            this.fetchMerchant();
            this.fetchBrand();
            this.fetchSubBrand();
            this.fetchMall();
            //this.getResults(); //pagination result
        },
        data(){
            return {
                list:{},
                merchants:{},
                brands:{},
                sub_brands:{},
                shops:{},
                malls:{},
                add: {
                    id: "",
                    file:"",
                    promotion_title: "",
                    description: "",
                    start_date: "",
                    end_date: "",
                    url: "",
                    merchant: "",
                    mall: "",
                    shop: "",
                    brand: "",
                    sub_brand: "",
                    promotion_by: [],
                    activation: "",
                },
            }
        },

        methods:{
            fetchPromotionUpdate(){
                axios.get('http://localhost:8000/api/promotions')
                .then(res => {
                    this.list = res.data;
                }).then(res => {
                    $("#promotionUpdateTable").DataTable({
                        //"dom":'<"row"<"col-sm-12"B>flrtip<"clear">',
                        "dom": 'Bflrtip<"clear">',
                        "buttons": [
                            //{extend: 'copy'},
                            {
                                extend: 'csv',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
                                }
                            },
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
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
                            { "visible": false, "targets": 9 }
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
                    var table = $('#promotionUpdateTable').DataTable();
                    $('#active').on('click', function () {
                      table
                        .column( 9 )
                        .search(1)
                        //.search('sayed|Science', true, false)
                        .draw();
                    });
                    $('#deactive').on('click', function () {
                      table
                        .column( 9 )
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

            fetchMerchant(){
                axios.get('http://localhost:8000/api/merchants')
                .then(res => {
                    this.merchants = res.data.data;
                }).catch(err => {console.log(err);});
            },

            fetchNewShop(){
                axios.get('http://localhost:8000/api/new_shops')
                .then(res => {
                    this.shops = res.data.data;
                    //console.log("Brand = ", this.list );
                }).catch(err => {console.log(err);});
            },

            fetchMall(){
                axios.get('http://localhost:8000/api/malls')
                .then(res => {
                    this.malls = res.data.data;
                }).catch(err => {console.log(err);});
            },

            fetchBrand(){
                axios.get('http://localhost:8000/api/brands')
                .then(res => {
                    this.brands = res.data.data;
                }).catch(err => {    console.log(err);});
            },

            fetchSubBrand(){
                axios.get('http://localhost:8000/api/sub_brands')
                .then(res => {
                    this.sub_brands = res.data.data;
                }).catch(err => {console.log(err);});
            },

            //Handles a change on the file upload
            handleFileUpload(){
                this.add.file = this.$refs.file.files[0];
            },
            // uniqueCheck(e){
            //     this.add.promotion_by = [];
            //     if (e.target.checked) {
            //         this.add.promotion_by.push(e.target.value);
            //     }
            // },

            addPost(){
                //console.log( this.add.promotion_by);
                if(this.add.file == '' || this.add.promotion_title == '' || this.add.description == '' || this.add.start_date == '' || this.add.end_date == '' || this.add.url == '' || this.add.merchant == '' || this.add.shop == '' || this.add.mall == '' || this.add.brand == '' || this.add.sub_brand == ''){
                    return alert("Please fill-up all the fields");
                }

                let formData = new FormData();
                formData.append('image', this.add.file);
                formData.append('promotion_title', this.add.promotion_title);
                formData.append('description', this.add.description);
                formData.append('start_date', this.add.start_date);
                formData.append('end_date', this.add.end_date);
                formData.append('url', this.add.url);
                formData.append('merchant', this.add.merchant);
                formData.append('shop', this.add.shop);
                formData.append('mall', this.add.mall);
                formData.append('brand', this.add.brand);
                formData.append('sub_brand', this.add.sub_brand);
                formData.append('promotion_by', this.add.promotion_by);
                formData.append('activation', this.add.activation);

                axios.post('http://localhost:8000/api/create_promotion', formData,
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
                axios.get('http://localhost:8000/api/single_promotion/'+id)
                .then(res => {
                    //console.log( res.data.data.promotion_by);
                    this.add.id = res.data.data.id,
                    this.add.promotion_title = res.data.data.promotion_title,
                    this.add.description = res.data.data.description,
                    this.add.start_date = res.data.data.start_date,
                    this.add.end_date = res.data.data.end_date,
                    this.add.url = res.data.data.url,
                    this.add.merchant = res.data.data.merchant,
                    this.add.shop = res.data.data.shop,
                    this.add.mall = res.data.data.mall,
                    this.add.brand = res.data.data.brand,
                    this.add.sub_brand = res.data.data.sub_brand,
                    this.add.activation = res.data.data.activation,
                    this.add.promotion_by = res.data.data.promotion_by
                }).catch(error => {console.log(error);});
            },
            updatePost(){
                axios.put('http://localhost:8000/api/update_promotion/' + this.add.id, this.add)
                .then(res => {
                    if(res.status == 200){
                        location.reload();
                    }
                }).catch(err => {console.log(err);});
            },
            activation(id){
                let activationCode;
                let promotion_title;
                let description;
                let start_date;
                let end_date;
                let url;
                let merchant;
                let shop;
                let mall;
                let brand;
                let sub_brand;
                let promotion_by;
                axios.get('http://localhost:8000/api/single_promotion/'+id)
                .then(res => {
                    //console.log("Response = "+res.data.data.activation);
                    promotion_title = res.data.data.promotion_title;
                    description = res.data.data.description;
                    start_date = res.data.data.start_date;
                    end_date = res.data.data.end_date;
                    url = res.data.data.url;
                    merchant = res.data.data.merchant;
                    shop = res.data.data.shop;
                    mall = res.data.data.mall;
                    brand = res.data.data.brand;
                    sub_brand = res.data.data.sub_brand;
                    promotion_by = res.data.data.promotion_by;

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
                    axios.put('http://localhost:8000/api/update_promotion/' + id, {promotion_title:promotion_title, description:description, start_date:start_date, end_date:end_date, url:url, merchant:merchant, shop:shop, mall:mall, brand:brand, sub_brand:sub_brand, promotion_by:promotion_by, activation: activationCode}).then(res => {location.reload();}).catch(err => {console.log("Error = "+err);})
                }).catch(err => {console.log("Error = "+err);})
                .catch(err => {console.log("Error = "+err);})
            },
            deletePost(id){
                //alert("Successfully Deleted");
                console.log(id);
                axios.delete('http://localhost:8000/api/promotions/'+id)
                .then(res => {
                    console.log("deleted", res.data);
                }).catch(err => {console.log(err); });
            }
        }
    }
</script>
