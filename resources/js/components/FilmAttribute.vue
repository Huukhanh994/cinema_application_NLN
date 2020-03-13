<template>
    <div>
        <div class="tile">
            <div class="tile-title">Attributes</div>
            <div class="tile-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="parent">Select an Atribute <span class="m-l-5 text-danger">*</span></label>
                            <select name="" id="parent" class="form-control custom-select mt-15" v-model="attribute" @change="selecteAttribute(attribute)">
                                <option :value="attribute" v-for="attribute in attributes" :key="attribute.id">{{attribute.name}}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tile" v-if="attributeSelected">
            <h3 class="tile-title">Add Attribute for Film</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="values">Select an value <span class="m-l-5 text-danger">* </span></label>
                        <select name="" id="values" class="form-control custom-select mt-15" v-model="value" @change="selectValue(value)">
                            <option :value="value" v-for="value in attributeValues" :key="value.id">
                                {{value.value}}
                            </option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row" v-if="valueSelected">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="quantity" class="control-label">Quantity</label>
                        <input type="number" class="form-control" id="quantity" v-model="currentQty">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="price" class="control-label">Price</label>
                        <input type="text" name="price" id="price" v-model="currentPrice" class="form-control">
                        <small class="text-danger">This price will be added to the main price of film</small>
                    </div>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-sm btn-primary" @click="addFilmAttribute()">
                        <i class="fa fa-plsu"></i>Add
                    </button>
                </div>
            </div>
        </div>
        <div class="tile">
            <div class="tile-title">Film Attributes</div>
            <div class="tile-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr class="text-center">
                                <th>Value</th>  
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="fa in filmAttributes" :key="fa.id">
                                <td style="width: 25%" class="text-center">{{fa.value}}</td>
                                <td style="width: 25%" class="text-center">{{fa.quantity}}</td>
                                <td style="width: 25%" class="text-center">{{fa.price}}</td>
                                <td style="width: 25%" class="text-center">
                                    <button class="btn btn-sm btn-danger" @click="deleteFilmAttribute(fa)">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["filmid"],
    name: "filmAttribute",
    data() {
        return {
            filmAttributes: [],
            attributes: [],
            attribute: {}, // Object,
            attributeSelected: false,       // thuoc tinh duoc chon
            attributeValues: [],            // mang cac gia tri cua thuoc tinh
            value: {},  // props
            valueSelected: false,           // gia tri duoc chon
            currentAttributeId: '',         
            currentValue: '',
            currentQty: '',
            currentPrice: '',

        }
    },
    created() {
        this.loadAttributes()
        this.loadFilmAttributes(this.filmid)
    },
    methods: {
        // Load các attributes từ table_attributes
        loadAttributes() {
            let _this = this;
            axios.get('/admin/films/attributes/load')
            .then(res => {
                _this.attributes = res.data
            })
            .catch(err => {
                console.log(err)
            })
        },

        // Load attributes film của bảng film_attributes
        loadFilmAttributes(id) {
            let _this = this;
            axios.post('/admin/films/attributes', {
                Fid: id
            }).then (function(response){
                _this.filmAttributes = response.data;
            }).catch(function (error) {
                console.log(error);
            });
        },

        // Chọn 
        selecteAttribute(attribute) {
            // alert(attribute.name);
            let _this = this;

            this.currentAttributeId = attribute.id
            axios.post('/admin/films/attributes/values', {
                id: attribute.id
            })
            .then(res => {
                _this.attributeValues = res.data
            })
            .catch(err => {
                console.log(err);
            });
            // gia tri thuoc tinh da duoc chon
            this.attributeSelected = true;
        },
        selectValue(value) {
            this.valueSelected = true,
            this.currentValue = value.value,
            this.currentQty = value.quantity,
            this.currentPrice = value.price
        },
        addFilmAttribute() {
            if(this.currentQty === null || this.currentPrice === null) {
                this.$swal("Error, Some values are missing", {
                    icon: "error",
                });
            } else {
                let _this = this;
                let data = {
                    attribute_id: this.currentAttributeId,
                    value: this.currentValue,
                    price: this.currentPrice,
                    quantity: this.currentQty,
                    film_id: this.filmid
                };

                axios.post('/admin/films/attributes/add', {
                    data: data
                }).then(res => {
                    _this.$swal("Success! " + res.data.message, {
                        icon: "success"
                    });

                    // Reset all paramenters
                    _this.currentValue = '',
                    _this.currentPrice = '',
                    _this.currentQty = '',
                    _this.valueSelected = false
                }).catch(err => {
                    console.log(err)
                });
                this.loadFilmAttributes(this.filmid);
            }
        },
        deleteFilmAttribute(fa) {
            let _this = this;
                this.$swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        console.log(fa.id);
                        axios.post('/admin/films/attributes/delete', {
                            id: fa.id,
                        }).then (function(response){
                            if (response.data.status === 'success') {
                                _this.$swal("Success! Film attribute has been deleted!", {
                                    icon: "success",
                                });
                                this.loadFilmAttributes(this.filmid);
                                location.reload(true);
                            } else {
                                _this.$swal("Your Film attribute not deleted!");
                            }
                        }).catch(function (error) {
                            console.log(error);
                        });
                    } else {
                        this.$swal("Action cancelled!", {
                            icon: "warning"
                        });
                    }
                });
        }

    }
}
</script>
