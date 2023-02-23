<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Edit Product
                            </div>
                            <div>
                                <a href="{{route('admin.products')}}" class="btn btn-success pull-right">All products</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <form class="form-horizontal"enctype="multipart/form-data" wire:submit.prevent="updateProduct">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Product Name</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Product Name" class="form-control input-md"wire:model="name"wire:keyup="generateSlug"/>
                                    @error('name')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Product Slug</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Product slug" class="form-control input-md"wire:model="slug"/>
                                    @error('slug')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Short Description</label>
                                <div class="col-md-4" wire:ignore>
                                    <textarea class="form-control"id="short_description" placeholder="short description"wire:model="short_description"></textarea>
                                    @error('short_description')<p class="text-danger">{{$message}}</p>@enderror

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Description</label>
                                <div class="col-md-4" wire:ignore>
                                    <textarea class="form-control" id="description" placeholder="description"wire:model="description"></textarea>
                                    @error('description')<p class="text-danger">{{$message}}</p>@enderror

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Regular price</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Regular price" class="form-control input-md"wire:model="regular_price"/>
                                    @error('regular_price')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Sale price</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Sale price" class="form-control input-md"wire:model="sale_price"/>
                                    @error('sale_price')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">SKU</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="SKU" class="form-control input-md" wire:model="SKU"/>
                                    @error('SKU')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Stock</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="stock_status">
                                        <option value="instock">InStock</option>
                                        <option value="out of stock">Out of Stock</option>
                                    </select>
                                    @error('stock_status')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Features</label>
                                <div class="col-md-4">
                                    <select class="form-control"wire:model="featured">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Qunatity</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Quantity" class="form-control input-md" wire:model="quantity"/>
                                    @error('quantity')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Product Image</label>
                                <div class="col-md-4">
                                    <input type="file" class="input-file" wire:model="newimage"/>
                                    @if($newimage)
                                        <img src="{{$newimage->temporaryUrl()}}" width="120"/>
                                    @else
                                        <img src="{{asset('assets/images/products')}}/{{ $image}}" width="120"/>
                                    @endif
                                    @error('newimage')<p class="text-danger">{{$message}}</p>@enderror

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Product Gallery</label>
                                <div class="col-md-4">
                                    <input type="file" class="input-file" wire:model="newimages" multiple/>
                                    @if($newimages)
                                        @foreach($newimages as $newimage)
                                            @if($newimage)
                                                <img src="{{$newimage->temporaryUrl()}}" width="120">
                                            @endif
                                        @endforeach
                                    @else
                                        @foreach($images as $image)
                                            @if($image)
                                                <img src="{{asset('assets/images/products')}}/{{ $image}}" width="120"/>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Category</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="category" wire:change="changeSubcategory">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')<p class="text-danger">{{$message}}</p>@enderror

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Sub Category</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="scategory_id">
                                        <option value="0">Select Category</option>
                                        @foreach($scategories as $scategory)
                                            <option value="{{$scategory->id}}">{{$scategory->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('scategory_id')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Product Attributes</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="attr">
                                        <option value="0">Select Attribute</option>
                                        @foreach($pattributes as $pattribute)
                                            <option value="{{$pattribute->id}}">{{$pattribute->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('scategory_id')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-info" wire:click.prevent="add">Add</button>
                                </div>
                            </div>
                            @foreach($input as $key=>$value)
                                <div class="form-group">
                                    <label class="col-md-4 control-label">{{$pattributes->where('id',$attribute_arr[$key])->first()->name}}</label>
                                    <div class="col-md-3">
                                        <input type="text" placeholder="{{$pattributes->where('id',$attribute_arr[$key])->first()->name}}" class="form-control input-md" wire:model="attribute_values.{{$value}}"/>
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-danger btn-sm" wire:click.prevent="remove({{$key}})">Remove</button>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"></label>
                                        <div class="col-md-4">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(function (){
            tinymce.init({
                selector:'#short_description',
                setup:function (editor){
                    editor.on('Change',function (e){
                        tinyMCE.triggerSave();
                        var sd_data=$('#short_description').val();
                    @this.set('short_description',sd_data);
                    });
                }
            });
            tinymce.init({
                selector:'#description',
                setup:function (editor){
                    editor.on('Change',function (e){
                        tinyMCE.triggerSave();
                        var d_data=$('#description').val();
                    @this.set('description',d_data);
                    });
                }
            });
        });
    </script>
@endpush

