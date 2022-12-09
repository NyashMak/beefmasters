@extends('admin.layouts.app')
@section('body')
      <!-- Main Container -->
          <!-- Quick Overview + Actions -->
          <div class="row items-push">
            <div class="col-6 col-lg-4">
              <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="be_pages_ecom_orders.html">
                <div class="block-content py-5">
                  <div class="fs-3 fw-semibold mb-1">250</div>
                  <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                    Pending
                  </p>
                </div>
              </a>
            </div>
            <div class="col-6 col-lg-4">
              <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="javascript:void(0)">
                <div class="block-content py-5">
                  <div class="fs-3 fw-semibold mb-1">29</div>
                  <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                    Available
                  </p>
                </div>
              </a>
            </div>
            <div class="col-lg-4">
              <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="{{route('delete-product')}}">
                <div class="block-content py-5">
                  <div class="fs-3 text-danger mb-1">
                    <i class="fa fa-times"></i>
                  </div>
                  <p class="fw-semibold fs-sm text-danger text-uppercase mb-0">
                    Remove Product
                  </p>
                </div>
              </a>
            </div>
          </div>
          <!-- END Quick Overview + Actions -->

          <!-- Info -->
          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">Product Information</h3>
            </div>
            <div class="block-content">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                  <form action="{{route('products.update', $product)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                      <label class="form-label" for="dm-ecom-product-id">PID</label>
                      <input type="text" class="form-control" id="id" name="id" value="{{$product->id}}" readonly>
                    </div>
                    <div class="mb-4">
                      <label class="form-label" for="dm-ecom-product-name">Name</label>
                      <input required type="text" class="form-control" id="dm-ecom-product-name" name="name" value="{{$product->name}}">
                    </div>
                    <div class="mb-4">
                      <!-- CKEditor (js-ckeditor-inline + js-ckeditor ids are initialized in Helpers.jsCkeditor()) -->
                      <!-- For more info and examples you can check out http://ckeditor.com -->
                      <label class="form-label">Description</label>
                      <textarea required cols="64" id="js-ckeditor" name="description">{{$product->description}}</textarea>
                    </div>
                    <div class="mb-4">
                      <!-- Select2 (.js-select2 class is initialized in Helpers.jqSelect2()) -->
                      <!-- For more info and examples you can check out https://github.com/select2/select2 -->
                      <label class="form-label" for="dm-ecom-product-category">Category</label>
                      <select required class="js-select2 form-select" id="dm-ecom-product-category" name="category" style="width: 100%;" data-placeholder="Choose one..">
                        @if($categories)
                          @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                          @endforeach
                        @endif
                      </select>
                    </div>
                    <div class="row mb-4">
                      <div class="col-md-6">
                        <label class="form-label" for="dm-ecom-product-price">Price in Rands (R)</label>
                        <input required type="text" class="form-control" id="dm-ecom-product-price" name="price" value="{{$product->price}}">
                      </div>
                    </div>
                    <div class="row mb-4">
                      <div class="col-md-6">
                        <label class="form-label" for="dm-ecom-product-stock">Stock</label>
                        <input required type="text" class="form-control" id="dm-ecom-product-stock" name="quantity" value="{{$product->quantity}}">
                      </div>
                    </div>
                    <div class="mb-4">
                      <label class="form-label">Available?</label>
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" value="1" id="available" name="available">
                        <label class="form-check-label" for="available"></label>
                      </div>
                    </div>
                    <div class="mb-4">
                      <label class="form-label">Publish?</label>
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" value="1" id="published" name="published">
                        <label class="form-check-label" for="published"></label>
                      </div>
                    </div>
                    <div class="mb-4">
                      <button type="submit" class="btn btn-alt-primary">Update</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- END Info -->


      <!-- END Main Container -->
@endsection