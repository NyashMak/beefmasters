@extends('admin.layouts.app')
@section('body')
          <!-- Quick Overview -->
          <div class="row items-push">
            <div class="col-6 col-lg-3">
              <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="{{route('products.create')}}">
                <div class="block-content py-5">
                  <div class="fs-3 fw-semibold text-success mb-1">
                    <i class="fa fa-plus"></i>
                  </div>
                  <p class="fw-semibold fs-sm text-success text-uppercase mb-0">
                    Add New
                  </p>
                </div>
              </a>
            </div>
            <div class="col-6 col-lg-3">
              <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="javascript:void(0)">
                <div class="block-content py-5">
                  <div class="fs-3 fw-semibold text-danger mb-1">63</div>
                  <p class="fw-semibold fs-sm text-danger text-uppercase mb-0">
                    Out of stock
                  </p>
                </div>
              </a>
            </div>
            <div class="col-6 col-lg-3">
              <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="javascript:void(0)">
                <div class="block-content py-5">
                  <div class="fs-3 fw-semibold text-dark mb-1">690</div>
                  <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                    New
                  </p>
                </div>
              </a>
            </div>
            <div class="col-6 col-lg-3">
              <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="javascript:void(0)">
                <div class="block-content py-5">
                  <div class="fs-3 fw-semibold text-dark mb-1">36.963</div>
                  <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                    All Products
                  </p>
                </div>
              </a>
            </div>
          </div>
          <!-- END Quick Overview -->

          <!-- All Products -->
          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">All Products</h3>
              <div class="block-options">
                <div class="dropdown">
                  <button type="button" class="btn btn-alt-secondary" id="dropdown-ecom-filters" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Filters <i class="fa fa-angle-down ms-1"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-ecom-filters">
                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                      New
                      <span class="badge bg-success rounded-pill">260</span>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                      Out of Stock
                      <span class="badge bg-danger rounded-pill">63</span>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                      All
                      <span class="badge bg-black-50 rounded-pill">36k</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="block-content bg-body-dark">
              <!-- Search Form -->
              <form action="be_pages_ecom_products.html" method="POST" onsubmit="return false;">
                <div class="mb-4">
                  <input type="text" class="form-control form-control-alt" id="dm-ecom-products-search" name="dm-ecom-products-search" placeholder="Search all products..">
                </div>
              </form>
              <!-- END Search Form -->
            </div>
            <div class="block-content">
              <!-- All Products Table -->
              <div class="table-responsive">
                <table class="table table-borderless table-striped table-vcenter">
                  <thead>
                    <tr>
                      <th class="text-center" style="width: 100px;">ID</th>
                      <th class="d-none d-sm-table-cell text-center">Added</th>
                      <th class="d-none d-md-table-cell">Product</th>
                      <th>Status</th>
                      <th class="d-none d-sm-table-cell text-end">Value</th>
                      <th class="text-center">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($products)
                      @foreach ($products as $product)
                    <tr>
                      <td class="text-center fs-sm">
                        <a class="fw-semibold" href="be_pages_ecom_product_edit.html">
                          <strong>{{$product->id}}</strong>
                        </a>
                      </td>
                      <td class="d-none d-sm-table-cell text-center fs-sm">{{$product->created_at}}</td>
                      <td class="d-none d-md-table-cell fs-sm">
                        <a class="fw-semibold" href="be_pages_ecom_product_edit.html">{{$product->name}}</a>
                      </td>
                      <td>
                        <span class="badge bg-success">Available</span>
                      </td>
                      <td class="text-end d-none d-sm-table-cell fs-sm">
                        <strong>{{$product->price}}</strong>
                      </td>
                      <td class="text-center fs-sm">
                        <a class="btn btn-sm btn-alt-secondary" href="{{route('products.edit', $product->id)}}">
                          <i class="fa fa-fw fa-eye"></i>
                        </a>
                        <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)">
                          <i class="fa fa-fw fa-times text-danger"></i>
                        </a>
                      </td>
                    </tr>
                      @endforeach
                    @endif
                    <tr>
                      <td class="text-center fs-sm">
                        <a class="fw-semibold" href="be_pages_ecom_product_edit.html">
                          <strong>PID.036535</strong>
                        </a>
                      </td>
                      <td class="d-none d-sm-table-cell text-center fs-sm">17/05/2019</td>
                      <td class="d-none d-md-table-cell fs-sm">
                        <a class="fw-semibold" href="be_pages_ecom_product_edit.html">Product #35</a>
                      </td>
                      <td>
                        <span class="badge bg-success">Available</span>
                      </td>
                      <td class="text-end d-none d-sm-table-cell fs-sm">
                        <strong>$18,00</strong>
                      </td>
                      <td class="text-center fs-sm">
                        <a class="btn btn-sm btn-alt-secondary" href="{{route('products.edit',1)}}">
                          <i class="fa fa-fw fa-eye"></i>
                        </a>
                        <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)">
                          <i class="fa fa-fw fa-times text-danger"></i>
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center fs-sm">
                        <a class="fw-semibold" href="be_pages_ecom_product_edit.html">
                          <strong>PID.036534</strong>
                        </a>
                      </td>
                      <td class="d-none d-sm-table-cell text-center fs-sm">01/02/2019</td>
                      <td class="d-none d-md-table-cell fs-sm">
                        <a class="fw-semibold" href="be_pages_ecom_product_edit.html">Product #34</a>
                      </td>
                      <td>
                        <span class="badge bg-danger">Out of Stock</span>
                      </td>
                      <td class="text-end d-none d-sm-table-cell fs-sm">
                        <strong>$50,00</strong>
                      </td>
                      <td class="text-center fs-sm">
                        <a class="btn btn-sm btn-alt-secondary" href="be_pages_ecom_product_edit.html">
                          <i class="fa fa-fw fa-eye"></i>
                        </a>
                        <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)">
                          <i class="fa fa-fw fa-times text-danger"></i>
                        </a>
                      </td>
                    </tr>
                    
                    
                  </tbody>
                </table>
              </div>
              <!-- END All Products Table -->

              <!-- Pagination -->
              <nav aria-label="Photos Search Navigation">
                <ul class="pagination justify-content-end mt-2">
                  <li class="page-item">
                    <a class="page-link" href="javascript:void(0)" tabindex="-1" aria-label="Previous">
                      Prev
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="javascript:void(0)">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="javascript:void(0)">2</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="javascript:void(0)">3</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="javascript:void(0)">4</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="javascript:void(0)" aria-label="Next">
                      Next
                    </a>
                  </li>
                </ul>
              </nav>
              <!-- END Pagination -->
            </div>
          </div>
          <!-- END All Products -->

      <!-- END Main Container -->
@endsection
