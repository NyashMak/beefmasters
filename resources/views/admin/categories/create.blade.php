@extends('admin.layouts.app')
@section('body')
      <!-- Main Container -->
      <div class="block block-rounded">
        <div class="block-header block-header-default">
          <h3 class="block-title">Category Info</h3>
        </div>
      </div>
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
              <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="be_pages_ecom_product_edit.html">
                <div class="block-content py-5">
                  <div class="fs-3 text-danger mb-1">
                    <i class="fa fa-times"></i>
                  </div>
                  <p class="fw-semibold fs-sm text-danger text-uppercase mb-0">
                    Remove Category
                  </p>
                </div>
              </a>
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
                  <form action="{{route('categories.store')}}" method="POST">
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
                      <label class="form-label" for="shop_id">Shop</label>
                      <select class="js-select2 form-select" id="dm-ecom-product-category" name="shop_id" style="width: 100%;" data-placeholder="Select Shop..">
                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                        <option value="1" selected>Butchery</option>
                        <option value="2">Farm</option>
                      </select>
                    </div>
                    <div class="mb-4">
                      <button type="submit" class="btn btn-alt-primary">Create</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- END Info -->

      <!-- END Main Container -->
@endsection