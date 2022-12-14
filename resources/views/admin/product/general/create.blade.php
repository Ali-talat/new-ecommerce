<x-admin-home>

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">الرئيسية </a>
                            </li>
                            <li class="breadcrumb-item"><a href=""> الاقسام الرئيسية </a>
                            </li>
                            <li class="breadcrumb-item active"> انشاء منتج جديد
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form"> انشاء منتج جديد </h4>
                                <a class="heading-elements-toggle"><i
                                        class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            @include('livewire.admin.inc.success')
                            @include('livewire.admin.inc.errors')
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <form class="form"
                                          action="{{route('product.store')}}"
                                          method="POST"
                                          enctype="multipart/form-data">
                                        @csrf

                                        

                                        



                                        <div class="form-body">

                                            <h4 class="form-section"><i class="ft-home"></i> بيانات المنتج </h4>
                                            <div class="row">
                                                <div class="col-md-12">
                                                   
                                                        <label for="projectinput1"> اسم المنتج
                                                             </label>
                                                        <input type="text" id="name"
                                                               class="form-control"
                                                               placeholder="  "
                                                               value=""
                                                               name="name">
                                                        @error("name")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                </div>
                                                <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> وصف المنتج
                                                                 </label>
                                                            <textarea name="description" class="form-control myTexteare" id="" ></textarea>
                                                            @error("description")
                                                            <span class="text-danger">{{$message}}</span> 
                                                            @enderror
                                                        </div>
                                                    
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> وصف مختصر
                                                             </label>
                                                        <textarea name="short_description" class="form-control" id="" ></textarea>
                                                        @error("short_description")
                                                        <span class="text-danger">{{$message}}</span> 
                                                        @enderror
                                                    </div>
                                                
                                            </div>
                                                
                                                    <div class="col-md-3 m-2">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> اختر القسم
                                                            </label>
                                                            <select name="categories[]" class="select2 form-control" multiple>
                                                                <optgroup label="من فضلك أختر القسم ">
                                                                    @if($categories && $categories -> count() > 0)
                                                                        @foreach($categories as $index => $category)
                                                                        @if ($category->name !== null)
                                                                        <option
                                                                        value="{{$category -> id }}">{{$category -> name }}</option>
                                                                        @endif
                                                                            
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('categories.*')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 m-2">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> اختر ألعلامات الدلالية
                                                            </label>
                                                            <select name="tags[]" class="select2 form-control" multiple>
                                                                <optgroup label=" اختر ألعلامات الدلالية ">
                                                                    @if($tags && $tags -> count() > 0)
                                                                        @foreach($tags as $tag)
                                                                        @if ($tag->name !== null)
                                                                        <option
                                                                        value="{{$tag -> id }}">{{$tag ->name}}</option>
                                                                        @endif
                                                                            
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('tags.*')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 m-2">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> اختر ألماركة
                                                            </label>
                                                            <select name="brand_id" class="select2 form-control">
                                                                <optgroup label="من فضلك أختر الماركة ">
                                                                    @if($brands && $brands -> count() > 0)
                                                                        @foreach($brands as $brand)
                                                                            <option
                                                                                value="{{$brand -> id }}">{{$brand -> name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('brand_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                

                                                <div class="col-md-6">
                                                    <div class="form-group mt-1">
                                                        <input type="checkbox" value="1"
                                                               name="is_active"
                                                               id="switcheryColor4"
                                                               class="switchery" data-color="success"/>
                                                        <label for="switcheryColor4"
                                                               class="card-title ml-1">الحالة  </label>

                                                        @error("is_active")
                                                        <span class="text-danger">{{$message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                





                                            </div>
                                            
                                            
                                        </div>


                                        <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1"
                                                    onclick="history.back();">
                                                <i class="ft-x"></i> تراجع
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> تحديث
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Basic form layout section end -->

        </div>
    </div>
</div>



{{-- @push('script')

<script>
    
    tinymce.init({
        selector : '.myTexteare'
    });
</script>
    
@endpush --}}

</x-admin-home>