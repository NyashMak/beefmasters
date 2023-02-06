@extends('admin.layouts.app')
@section('body')
      <!-- Main Container -->
          <!-- Quick Overview + Actions -->
          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">Create New Product</h3>
            </div>
          </div>
          <!-- END Quick Overview + Actions -->

          <!-- Info -->
          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">Product Info</h3>
            </div>
            <div class="block-content">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                  <form action="{{route('products.store')}}" method="POST">
                    @csrf
                    <div class="mb-4">
                      <label class="form-label" for="name">Name</label>
                      <input type="text" class="form-control" id="dm-ecom-product-name" name="name" value="">
                    </div>
                    <div class="mb-4">
                      <!-- CKEditor (js-ckeditor-inline + js-ckeditor ids are initialized in Helpers.jsCkeditor()) -->
                      <!-- For more info and examples you can check out http://ckeditor.com -->
                      <label class="form-label">Description</label>
                      <textarea class="form-control" rows="4" id="js-ckeditor" name="description"></textarea>
                    </div>
                    <div class="mb-4">
                      <!-- Select2 (.js-select2 class is initialized in Helpers.jqSelect2()) -->
                      <!-- For more info and examples you can check out https://github.com/select2/select2 -->
                      <label class="form-label" for="category">Category</label>
                      <select class="js-select2 form-select" id="dm-ecom-product-category" name="category_id" style="width: 100%;" data-placeholder="Choose one..">
                        @if($categories)
                          <option value="">Click to select</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                          @foreach($categories as $category)
                          <option value="{{$category->id}}">{{$category->name}}</option>
                          @endforeach
                        @else
                        <option>There are no categories available</option><!-- Required for data-placeholder attribute to work with Select2 plugin --> 
                        @endif
                      </select>
                    </div>
                    <div class="row mb-4">
                      <div class="col-md-6">
                        <label class="form-label" for="price">Price in Rands (R)</label>
                        <input type="number" class="form-control" id="dm-ecom-product-price" name="price" value="">
                      </div>
                    </div>
                    <div class="row mb-4">
                      <div class="col-md-6">
                        <label class="form-label" for="quantity">Stock</label>
                        <input type="number" class="form-control" id="dm-ecom-product-stock" name="quantity" value="29">
                      </div>
                    </div>
                    <div class="mb-4">
                      <!-- Select2 (.js-select2 class is initialized in Helpers.jqSelect2()) -->
                      <!-- For more info and examples you can check out https://github.com/select2/select2 -->
                      <label class="form-label" for="discount_id">Discount</label>
                      <select class="js-select2 form-select" id="dm-ecom-product-category" name="discount_id" style="width: 100%;" data-placeholder="Choose one..">
                        @if($discounts)
                          <option value="">Click to select</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                          @foreach($discounts as $discount)
                          <option value="{{$discount->id}}">{{$discount->name}}</option>
                          @endforeach
                        @else
                        <option>There are no discounts available</option><!-- Required for data-placeholder attribute to work with Select2 plugin --> 
                        @endif
                      </select>
                    </div>
                    <div class="mb-4">
                      <label class="form-label">Publish</label>
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" value="" id="dm-ecom-product-published" name="publish">
                        <label class="form-check-label" for="publish"></label>
                      </div>
                    </div>
                    <div class="mb-4">
                      <button type="submit" class="btn btn-alt-primary">Create Product</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- END Info -->

          <!-- Media -->
          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">Media</h3>
            </div>
            <div class="block-content block-content-full">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                  <!-- Dropzone (functionality is auto initialized by the plugin itself in js/plugins/dropzone/dropzone.min.js) -->
                  <!-- For more info and examples you can check out http://www.dropzonejs.com/#usage -->
                  <form class="dropzone" action="be_pages_ecom_product_edit.html"></form>
                </div>
              </div>
            </div>
          </div>
          <!-- END Media -->

      <!-- END Main Container -->
@endsection