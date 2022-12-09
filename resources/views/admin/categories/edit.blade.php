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
              <form action="{{route('delete-category')}}" method="POST">
                @csrf
                <input hidden type="number" name="id" value="{{$category->id}}">
                <button type="submit" class="block block-rounded block-link-shadow text-center h-100 mb-0">
                  <div class="block-content py-5">
                    <div class="fs-3 text-danger mb-1">
                      <i class="fa fa-times"></i>
                    </div>
                    <p class="fw-semibold fs-sm text-danger text-uppercase mb-0">
                      Remove Category
                    </p>
                  </div>
                </button>
              </form>
            </div>
          </div>
          <!-- END Quick Overview + Actions -->

          <!-- Info -->
          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">Category Info</h3>
            </div>
            <div class="block-content">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                  <form action="{{route('categories.update', $category)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <input hidden type="number" name="id" value="{{$category->id}}">
                    <div class="mb-4">
                      <label class="form-label" for="name">Name</label>
                      <input required type="text" class="form-control" id="category_name" name="name" value="{{$category->name}}">
                    </div>
                    <div class="mb-4">
                      <!-- CKEditor (js-ckeditor-inline + js-ckeditor ids are initialized in Helpers.jsCkeditor()) -->
                      <!-- For more info and examples you can check out http://ckeditor.com -->
                      <label required class="form-label">Description</label>
                      <textarea class="form-control" rows="4" cols="65" id="js-ckeditor" name="description">{{$category->description}}</textarea>
                    </div>
                    <div class="mb-4">
                      <!-- Select2 (.js-select2 class is initialized in Helpers.jqSelect2()) -->
                      <!-- For more info and examples you can check out https://github.com/select2/select2 -->
                      <label class="form-label" for="shop_id">Shop</label>
                      <select required class="js-select2 form-select" id="dm-ecom-product-category" name="shop_id" style="width: 100%;" data-placeholder="Select Shop..">
                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                        @if($shops)
                          @foreach($shops as $shop)
                            <option value="{{$shop->id}}" selected>{{$shop->name}}</option>
                          @endforeach
                        @endif
                      </select>
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