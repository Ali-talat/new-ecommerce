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
                            <li class="breadcrumb-item"><a href="">
                                    المنتجات </a>
                            </li>
                            <li class="breadcrumb-item active"> أضافه منتج
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
                                <h4 class="card-title" id="basic-layout-form"> أضافة منتج جديد </h4>
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
                                          action="{{route('product.price.store',$id)}}"
                                          method="POST"
                                          enctype="multipart/form-data">
                                        @csrf

                                        <input type="hidden" name="product_id" value="{{$id}}">
                                        <div class="form-body">

                                            <h4 class="form-section"><i class="ft-home"></i> البيانات الاساسية للمنتج   </h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> سعر  المنتج
                                                        </label>
                                                        <input type="number" id="price"
                                                               class="form-control"
                                                               placeholder="  "
                                                               value="{{old('price')}}"
                                                               name="price">
                                                        @error("price")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6" >
                                                    <div class="form-group">
                                                        <label for="projectinput1"> سعر خاص
                                                        </label>
                                                        <input type="number"
                                                               class="form-control" id="special_price" 
                                                               placeholder="  "
                                                               value="{{old('special_price')}}"
                                                               name="special_price">
                                                        @error("special_price")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="projectinput1">نوع السعر
                                                        </label>
                                                        <select name="special_price_type" class="select2 form-control" >
                                                            <optgroup label="من فضلك أختر النوع ">
                                                                <option disabled selected>Select an option</option>
                                                                <option  value="percent">precent</option>
                                                                <option  value="fixed">fixed</option>
                                                            </optgroup>
                                                        </select>
                                                        @error('special_price_type')
                                                        <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>


                                            </div>


                                            <div class="row"  id="startEndPrice" style="display: none ">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> تاريخ البداية
                                                        </label>

                                                        <input type="date" id="price"
                                                               class="form-control"
                                                               placeholder="  "
                                                               value="{{old('special_price_start')}}"
                                                               name="special_price_start">

                                                        @error('special_price_start')
                                                        <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> تاريخ البداية
                                                        </label>
                                                        <input type="date" id="price"
                                                               class="form-control"
                                                               placeholder="  "
                                                               value="{{old('special_price_end')}}"
                                                               name="special_price_end">

                                                        @error('special_price_end')
                                                        <span class="text-danger"> {{$message}}</span>
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


@push('script')
<script>

$(document).ready(function() {
  $('#special_price').on('input', function() {
    $('#startEndPrice').show();
  });
});

</script>
  
@endpush



</x-admin-home>