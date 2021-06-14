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
            <div class="dropdown ml-2">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">Category</button>
                <div class="dropdown-menu">
                <p class="dropdown-item" style="cursor: pointer;" v-for='(category,index) in uniqCategory' :key='index' @click='filterCategory(category.category)'>{{category.category}}</p>
                </div>
            </div>
            <div class="dropdown ml-2">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">Product</button>
                <div class="dropdown-menu">
                <p class="dropdown-item" style="cursor: pointer;" v-for='(product,index) in uniqProduct' :key='index' @click='filterProduct(product.product_name)'>{{product.product_name}}</p>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <Button class="btn btn-success mb-5" data-toggle="modal" data-target="#addPostModal">Create Product</Button>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="productTable" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Product</th>
                                <th>Activation</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody >
                            <tr v-for="item in list.data" :key="item.id">
                                <td>{{item.id}}</td>
                                <td><img :src="'/storage/app/'+item.image" alt="image"></td>
                                <td>{{item.category}}</td>
                                <td>{{item.product_name}}</td>
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
        <!-- Add Product Modal -->
        <div class="modal fade" id="addPostModal">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Create Product</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div>
                            <input type="file" id="file" ref="file" v-on:change="handleFileUpload()"/>
                        </div>
                        <div class="row mt-5">
                            <div class="col-sm-2">Product</div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="" id="postTitle" v-model="add.product_name">
                            </div>
                            <div class="col-sm-2 mt-3">Category</div>
                            <div class="col-sm-10 mt-3">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.category">
                                        <option v-for="(category, index) in categories" :key="index" v-bind:value="category.id">{{ category.category }}---{{ category.id }}</option>
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

        <!-- Edit Product Modal -->
        <div class="modal fade" id="editPostModal">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Edit Product</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-2">Product</div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="" id="postTitle" v-model="add.product_name">
                            </div>
                            <div class="col-sm-2 mt-3">Category</div>
                            <div class="col-sm-10 mt-3">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.category">
                                        <option v-for="(category, index) in categories" :key="index" v-bind:value="category.id">{{ category.category }}---{{ category.id }}</option>
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
            this.fetchProducts();
            this.fetchCategory();
            //this.getResults(); //pagination result
        },
        data(){
            return {
                list:{},
                categories:{},
                uniqCategory:null,
                uniqProduct:null,
                add: {
                    id: "",
                    file:"",
                    product_name: "",
                    category: "",
                    activation:""
                },
            }
        },
        methods:{

            fetchCategory(){
                axios.get('http://localhost:8000/api/product_categories')
                .then(res => {
                    this.categories = res.data.data;
                    //console.log("category", this.categories);
                }).catch(err => {console.log(err);});
            },

            fetchProducts(){
                axios.get('http://localhost:8000/api/products')
                .then(res => {
                    this.list = res.data;

                    //remove duplicates from the list array
                    let duplicates = this.list.data;
                    this.uniqCategory = _.uniqBy(duplicates, 'category');
                    this.uniqProduct = _.uniqBy(duplicates, 'product_name');
                }).then(res => {
                    $("#productTable").DataTable({
                        //"dom":'<"row"<"col-sm-12"B>flrtip<"clear">',
                        "dom": 'Bflrtip<"clear">',
                        "buttons": [
                            //{extend: 'copy'},
                            {
                                extend: 'csv',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3 ]
                                }
                            },
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3 ]
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
                            { "visible": false, "targets": 4 }
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
                    var table = $('#productTable').DataTable();
                    $('#active').on('click', function () {
                      table
                        .column( 4 )
                        .search(1)
                        //.search('sayed|Science', true, false)
                        .draw();
                    });
                    $('#deactive').on('click', function () {
                      table
                        .column( 4 )
                        .search(0)
                        //.search('sayed|Science', true, false)
                        .draw();
                    });
                }).catch(err => {console.log(err);});
            },
            filterCategory(categoryName){
                var table = $('#productTable').DataTable();
                table.column( 2 ).search(categoryName).draw();
            },
            filterProduct(productName){
                var table = $('#productTable').DataTable();
                table.column( 3 ).search(productName).draw();
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
                if(this.add.file == '' || this.add.product_name == '' || this.add.category == ''){
                    return alert("Please fill-up all the fields");
                }

                let formData = new FormData();
                formData.append('image', this.add.file);
                formData.append('product_name', this.add.product_name);
                formData.append('category', this.add.category);
                formData.append('activation', this.add.activation);

                axios.post('http://localhost:8000/api/create_product', formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                ).then(res => {
                    if(res.status == 201){
                        location.reload();
                    }
                }).catch(error => {
                    console.log(error);
                });
            },
            editPost(id){
                axios.get('http://localhost:8000/api/single_product/'+id)
                .then(res => {
                    this.add.id = res.data.data.id,
                    this.add.product_name = res.data.data.product_name,
                    this.add.category = res.data.data.category,
                    this.add.activation = res.data.data.activation
                }).catch(error => {
                    console.log(error);
                });
            },
            updatePost(){
                axios.put('http://localhost:8000/api/update_product/' + this.add.id, this.add)
                .then(res => {
                    if(res.status == 200){
                        location.reload();
                        //alert("Successfully Updated");
                    }
                }).catch(err => {
                    console.log(err);
                });
            },
            activation(id){
                let activationCode;
                let product_name;
                let category;
                axios.get('http://localhost:8000/api/single_product/'+id)
                .then(res => {
                    //console.log("Response = "+res.data.data.activation);
                     product_name = res.data.data.product_name;
                     category = res.data.data.category;
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
                    axios.put('http://localhost:8000/api/update_product/' + id, {product_name:product_name, category:category, activation: activationCode}).then(res => {location.reload();}).catch(err => {console.log("Error = "+err);})
                }).catch(err => {
                    console.log("Error = "+err);
                })
                .catch(err => {
                    console.log("Error = "+err);
                })
            },
            deletePost(id){
                //alert("Successfully Deleted");
                console.log(id);
                axios.delete('http://localhost:8000/api/products/'+id)
                .then(res => {
                    console.log("deleted", res.data);
                }).catch(err => {
                    console.log(err);
                });
            }
        }
    }
</script>
