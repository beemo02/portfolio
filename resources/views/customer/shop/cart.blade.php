@extends('customer.layouts.cart')

@section('cart_list')

<section class="h-100 h-custom" style="background-color: #eee;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class="card">
            <div class="card-body p-4">
  
              <div class="row">
  
                <div class="col-lg-7">
                  <h5 class="mb-3"><a href="#!" class="text-body"><i
                        class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                  <hr>
  
                  <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                      <p class="mb-1">Shopping cart</p>
                      @if (session('success'))
                      <div class="alert">{{ session('success') }}</div>
                      @endif
                    </div>
                    <div>
                      <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!"
                          class="text-body">price <i class="fas fa-angle-down mt-1"></i></a></p>
                    </div>
                  </div>
                  @foreach($cartItems as $item)
                  <div class="card mb-3">
                    
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                          <div>
                            <img
                              src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img1.webp"
                              class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                          </div>
                          <div class="ms-3">
                            <h5>{{$item['product']->name}}</h5>
                            <p class="small mb-0">{{$item['product']->productDescription}}</p>
                          </div>
                        </div>
                        <div class="d-flex flex-row align-items-center">
                          <div style="width: 50px;">
                            <h5 class="fw-normal mb-0">{{$item['quantity']}}</h5>
                          </div>
                          <div style="width: 80px;">
                            <h5 class="mb-0"></h5>{{$item['product']->price}}</h5>
                          </div>
                          <a href="#!" style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                  @endforeach
                </div>
            
                <div class="col-lg-5">
  
                  <div class="card bg-primary text-white rounded-3">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="mb-0">Card details</h5>
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp"
                          class="img-fluid rounded-3" style="width: 45px;" alt="Avatar">
                      </div>
  
                      <p class="small mb-2">Card type</p>
                      <a href="#!" type="submit" class="text-white"><i
                          class="fab fa-cc-mastercard fa-2x me-2"></i></a>
                      <a href="#!" type="submit" class="text-white"><i
                          class="fab fa-cc-visa fa-2x me-2"></i></a>
                      <a href="#!" type="submit" class="text-white"><i
                          class="fab fa-cc-amex fa-2x me-2"></i></a>
                      <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-paypal fa-2x"></i></a>
  
                      <form action="{{route('checkout.process')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="card_name">Cardholder's Name</label>
                            <input type="text" id="card_name" name="card_name" class="form-control" required>
                        </div>
    
                        <div class="form-group">
                            <label for="card_number">Card Number</label>
                            <input type="text" id="card_number" name="card_number" class="form-control" required>
                        </div>
    
                        <div class="form-row">
                            <div class="col">
                                <label for="expiration">Expiration</label>
                                <input type="text" id="expiration" name="expiration" class="form-control" placeholder="MM/YY" required>
                            </div>
                            <div class="col">
                                <label for="cvv">CVV</label>
                                <input type="password" id="cvv" name="cvv" class="form-control" required>
                            </div>
                        </div>
    
                        
                        <hr>
                        <p><strong>Subtotal:</strong> ${{ number_format($subtotal, 2) }}</p>
                        <p><strong>Total (Incl. taxes):</strong> ${{ number_format($subtotal, 2) }}</p>
                        
                        
                        <button type="submit"  class="btn btn-info">Checkout →</button>
                      </form>

                      
  
                    </div>
                  </div>
  
                </div>
  
              </div>
  
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


@endsection





@section('scripts');
<script> 
var cartCount = "{{ route('cart.count') }}";
function updateCartCount() {
    $.ajax({
        url: cartCount,
        method: 'GET',
        success: function(response) {
            $('#cart-count').text(response.count);
        }
    });
}

$(document).ready(function() {
    updateCartCount();
});

</script>
@endsection