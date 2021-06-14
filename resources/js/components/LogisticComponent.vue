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
            <Button class="btn btn-success mb-5" data-toggle="modal" data-target="#addPostModal">Create Logistic</Button>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="logisticTable" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Logistic Name</th>
                                <th>Activation</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for='item in list' :key='item.id'>
                                <td>{{item.id}}</td>
                                <td><img :src="'/storage/app/'+item.image" alt="image"></td>
                                <td>{{item.name}}</td>
                                <td>{{item.activation}}</td>
                                <td>
                                    <a class="btn btn-primary" href="#editPostModal" data-toggle="modal" @click="editPost(item.id);">View / Edit</a>
                                    <button class="btn text-white" :style="[item.activation == 1 ? {'background-color' : 'green'} : {'background-color' : 'red'}]" onclick="confirm('Confirm want to change activation?') || event.stopImmediatePropagation()" @click="activationUpdate(item.id);">Active / Deactive</button>
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
        <!-- Add New Logistic Modal -->
        <div class="modal fade" id="addPostModal">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Create Logistic</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div>
                            <input type="file" id="file" ref="file" v-on:change="handleFileUpload()"/>
                        </div>
                        <div class="row mt-5">
                            <div class="col-sm-2">Logistic Name</div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" v-model="name">
                            </div>
                            <div class="col-sm-2 mt-3">Add Charges</div>
                            <div class="col-sm-12 mt-3">
                                <div class="form-group" v-for="(input,k) in charges" :key="k">
                                    <input type="text" class="" placeholder="From" v-model="input.from">
                                    <input type="text" class="" placeholder="To" v-model="input.to">
                                    <input type="text" class="" placeholder="Weight" v-model="input.weight">
                                    <input type="text" class="" placeholder="Price" v-model="input.price">
                                    <span>
                                        <button class="btn btn-danger" @click="remove(k)" v-show="k || ( !k && charges.length > 1)">-</button>
                                        <button class="btn btn-success" @click="add(k)" v-show="k == charges.length-1">+</button>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-2 mt-3"><strong>Activation</strong></div>
                            <div class="col-sm-10 mt-3">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="addradio" v-bind:value="1" v-model="activation">Yes
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="addradio" v-bind:value="0" v-model="activation">No
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
                        <div>
                            <input type="file" id="file" ref="file" v-on:change="handleFileUpload()"/>
                        </div>
                        <div class="row mt-5">
                            <div class="col-sm-2">Logistic Name</div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" v-model="name">
                            </div>
                            <div class="col-sm-2 mt-3">Add Charges</div>
                            <div class="col-sm-12 mt-3">
                                <div class="form-group" v-for="(input,k) in charges" :key="k">
                                    <input type="text" class="" placeholder="From" v-model="input.from">
                                    <input type="text" class="" placeholder="To" v-model="input.to">
                                    <input type="text" class="" placeholder="Weight" v-model="input.weight">
                                    <input type="text" class="" placeholder="Price" v-model="input.price">
                                    <span>
                                        <button class="btn btn-danger" @click="remove(k)" v-show="k || ( !k && charges.length > 1)">-</button>
                                        <button class="btn btn-success" @click="add(k)" v-show="k == charges.length-1">+</button>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-2 mt-3"><strong>Activation</strong></div>
                            <div class="col-sm-10 mt-3">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="addradio" v-bind:value="1" v-model="activation">Yes
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="addradio" v-bind:value="0" v-model="activation">No
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
            this.fetchLogistic();
            //this.getResults(); //pagination result
        },
        data(){
            return {
                list:[],
                //imagePath: "",

                GUID:"",
                file:"",
                name: "",
                activation: "",
                charges:[
                    {
                        from: "",
                        to: "",
                        price: "",
                        weight: "",
                    }
                ]
            }
        },
        methods:{
            fetchLogistic(){
                axios.get('http://localhost:8000/api/logistics')
                .then(res => {
                    this.list = res.data.data;
                    // console.log(this.list);
                    // console.log(this.list.length);
                    // for(var i=0; i<=this.list.length; i++){
                    //     //console.log(this.list[i].image);
                    //     this.imagePath = "storage/app/"+this.list[i].image;
                    //     console.log(this.imagePath);
                    // }
                    //this.imagePath = res.data.data[0];
                    //console.log(this.imagePath);
                }).then(res => {
                    $("#logisticTable").DataTable({
                        //"dom":'<"row"<"col-sm-12"B>flrtip<"clear">',
                        "dom": 'Bflrtip<"clear">',
                        "buttons": [
                            //{extend: 'copy'},
                            {
                                extend: 'csv',
                                exportOptions: {
                                    columns: [ 0, 1, 2 ]
                                }
                            },
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: [ 0, 1, 2 ]
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
                            { "visible": false, "targets": 3 }
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
                    var table = $('#logisticTable').DataTable();
                    $('#active').on('click', function () {
                      table
                        .column( 3 )
                        .search(1)
                        //.search('sayed|Science', true, false)
                        .draw();
                    });
                    $('#deactive').on('click', function () {
                      table
                        .column( 3 )
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

            add(index) {
            this.charges.push({ from: '', to:'', weight:'', price:'' });
            },
            remove(index) {
                this.charges.splice(index, 1);
            },

            //Handles a change on the file upload
            handleFileUpload(){
                this.file = this.$refs.file.files[0];
            },

            addPost(){
                if(this.file == '' || this.name == ''){
                    return alert("Please fill-up all the fields");
                }

                //create GUID
                var dt = new Date().getTime();
                var uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
                    var r = (dt + Math.random()*16)%16 | 0;
                    dt = Math.floor(dt/16);
                    return (c=='x' ? r :(r&0x3|0x8)).toString(16);
                });
                this.GUID = uuid;
                //console.log(this.GUID);

                let formData = new FormData();
                formData.append('GUID', this.GUID);
                formData.append('image', this.file);
                formData.append('name', this.name);
                formData.append('activation', this.activation);

                axios.post('http://localhost:8000/api/create_logistic', formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                ).then(res => {
                    this.charges.forEach(element => {
                        //console.log(element.name);
                        axios.post('http://localhost:8000/api/create_logistic_charge', {GUID:this.GUID, from:element.from, to:element.to, price:element.price, weight:element.weight, activation:this.activation})
                        .then(res => {
                            if(res.status == 201){
                                location.reload();
                            }
                        }).catch(err => {console.log(err);});
                    });
                }).catch(error => {console.log(error);});
            },
            editPost(id){
                axios.get('http://localhost:8000/api/single_logistic/'+id)
                .then(res => {
                    this.id = res.data.data.id,
                    this.GUID = res.data.data.GUID;
                    this.name = res.data.data.name,
                    this.activation = res.data.data.activation
                }).then(res => {
                    axios.get('http://localhost:8000/api/logistic_charges/'+this.GUID)
                    .then(res => {
                        //console.log(res.data.data);
                        this.charges = res.data.data;
                    }).catch(err => {console.log(err);})
                }).catch(error => {console.log(error);});
            },
            updatePost(){
                axios.put('http://localhost:8000/api/update_logistic/' + this.id, {GUID:this.GUID, name:this.name, activation:this.activation})
                .then(res => {
                    this.charges.forEach(element => {
                        //console.log(element.from, element.GUID);
                        axios.put('http://localhost:8000/api/update_logistic_charge/' + this.GUID, {GUID:this.GUID, from:element.from, to:element.to, price:element.price, weight:element.weight, activation:element.activation})
                        .then(res => {
                            if(res.status == 201){
                                location.reload();
                            }
                        }).catch(err => {console.log(err);});
                    });
                }).catch(err => {console.log(err);});
            },
            activationUpdate(id){
                let activationCode;
                let GUID;
                let name;
                let charges = [];
                axios.get('http://localhost:8000/api/single_logistic/'+id)
                .then(res => {
                    //console.log("Response = "+res.data.data.activation);
                    GUID = res.data.data.GUID;
                    name = res.data.data.name;

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
                    axios.get('http://localhost:8000/api/logistic_charges/'+GUID)
                    .then(res => {
                        //console.log(res.data.data);
                        charges = res.data.data;
                        console.log("charges = ", charges);
                    }).catch(err => {console.log(err);})
                }).catch(err => {console.log(err)})
                .then(res => {
                    axios.put('http://localhost:8000/api/update_logistic/' + id, {GUID:GUID, name:name, activation:activationCode})
                    .then(res => {
                        charges.forEach(element => {
                            //console.log(element.from, element.GUID);
                            axios.put('http://localhost:8000/api/update_logistic_charge/' + GUID, {GUID:GUID, from:element.from, to:element.to, price:element.price, weight:element.weight, activation:activationCode})
                            .then(res => {
                                if(res.status == 201){
                                    location.reload();
                                }
                            }).catch(err => {console.log(err);});
                        });
                    }).catch(err => {console.log("Error = "+err);})
                }).catch(err => {console.log("Error = "+err);})
                .catch(err => {console.log("Error = "+err);})
            },
            deletePost(id){
                console.log(id);
                axios.delete('http://localhost:8000/api/logistics/'+id)
                .then(res => {
                    console.log("deleted", res.data);
                }).catch(err => {console.log(err);});
            }
        }
    }
</script>
