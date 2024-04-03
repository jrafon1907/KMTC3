
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dog Food</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

</head>
<body>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap');

*{
  font-family: 'Poppins', sans-serif;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body{
  background-color: #f4f4f4;
}

header{
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  z-index: 99;
 background: #e8847c;
}

 .search-container {
      display: flex;
      max-width: 400px;
      width: 100%;
    }

    .search-input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px 0 0 4px;
      box-sizing: border-box;
    }

    .search-button {
      padding: 10px;
      background-color: #007bff;
      color: #fff;
      border: 1px solid #007bff;
      border-radius: 0 4px 4px 0;
      cursor: pointer;
    }

.nav{
  max-width: 1200px;
  margin: auto;
  width: 100%;
  height: 50px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.logo{
  font-size: 1.1rem;
  font-weight: 500;
  text-decoration: none;
  text-transform: uppercase;
  color:#ffffff;
}

.box{
  color:white;
  width: 30px;
  height: 30px;
  text-align: center;
  position: relative;
}

.cart-count{
  position: absolute;
  background-color: #2f3542;
  top: -5px;
  right: 0;
  padding: 3px;
  height: 20px;
  width: 20px;
  line-height:20px ;
  border-radius: 50%;
  z-index: 99;
}

#cart-icon{
  font-size: 1.5rem;
  cursor: pointer;
  padding-top: 10px;
}

img{
  width: 100%;
}

.container{
  max-width: 1200px;
  padding: 4rem;
  margin: auto;
  width: 100%;
}

h2.title{
  font-size: 1.1rem;
  font-weight: 500;
  margin-bottom: 1.5rem;
  color:black;
}

.shop-content{
  display: grid;
  grid-template-columns: repeat(auto-fit,minmax(220px,auto));
  gap:1.5rem;
  justify-content: center;
  align-content: center;
}

.food-box{
  position: relative;
  background-color: #fff;
  padding: 10px;
  box-shadow: 0 1px 4px rgba(40, 37, 37, 0.1);
  border-radius: 3px;
}

.pic{
  overflow: hidden;
}

.pic:hover img{
transform: scale(1.5);
}

.food-img{
  transition: 0.4s;
  aspect-ratio: 1/1;
  object-fit: cover;
}

.food-title{
  font-size: 1rem;
  font-weight: 600;
  color:#ff6348;
}

.food-price{
  font-weight:500 ;
}

.add-cart{
  position: absolute;
  bottom: 0;
  right: 0;
  background-color: #2ed573;
  color:white;
  padding: 10px;
  font-size: 1.1rem;
  cursor: pointer;
  transition: 0.5s;
}

.add-cart:hover{
  background-color:rgba(255, 0, 0, 0.786);
}
  

.cart{
  position: fixed;
  top: 0;
  right: -100%;
  width: 400px;
  height: 100vh;
  overflow-y: auto;
  overflow-x: hidden;
  padding: 20px;
  background-color: white;
  box-shadow: 0 1px 4px rgba(40, 37, 37, 0.1);
  z-index: 100;
}

.cart-active{
  right:0;
  transition: 0.5s;
}

.cart-title{
  text-align: center;
  font-size: 1.5rem;
  font-weight: 500;
  margin-bottom: 1rem;
  padding-bottom:20px ;
  border-bottom: 1px solid rgba(0,0,0,0.1);
}

.cart-box{
  display: grid;
  grid-template-columns: 32% 50% 18%;
  align-items: center;
  gap: 1rem;
  margin-top: 1rem;
  border-bottom: 1px solid rgba(0,0,0,0.1);
  padding-bottom: 10px;
}

.cart-img{
  width: 75px;
  height: 75px;
  object-fit: cover;
  border:2px solid  rgba(0,0,0,0.1);
  padding: 5px;
}
.detail-box{
  display: grid;
  row-gap: 0.5rem;  
}

.price-box{
  display: flex;
    justify-content: space-between; 
}

.cart-food-title{
   font-size: 1rem;
   text-transform: uppercase;
   color:#ff6348;
   font-weight: 500;
}

.cart-price{
  font-weight: 500;
}

.cart-quantity{
  border:1px solid rgba(0,0,0,0.1);
  outline:none ;
  width: 2.4rem;
  text-align: center;
  font-size: 1rem;
}

.cart-remove{
  font-size: 24px;
  color:red;
  cursor: pointer;
}

.total{
  display: flex;
  justify-content: flex-end;
  margin-top: 1.5rem;
}

.total-title{
  font-size: 1rem;
  font-weight: 600;
}

.total-price{
  margin-left: 0.5rem;
}

.btn-buy{
  padding: 12px 20px;
  background-color:#2f3542;
  color:#fff;
  border: none;
  font-size: 1rem;
  font-weight: 500;
  cursor: pointer;
}

#cart-close{
  position: absolute;
  top: 1rem;
  right: 0.8rem;
  font-size: 2rem;
  cursor: pointer;
}

.back-button {
    padding: 8px 16px;
    background-color: #007bff; /* Blue background color */
    color: white; /* Text color */
    border: none; /* No border */
    border-radius: 4px; /* Rounded corners */
    cursor: pointer; /* Cursor on hover */
    font-size: 16px; /* Font size */
    transition: background-color 0.3s ease; /* Smooth transition */
    margin-bottom: 20px;
}

.back-button:hover {
    background-color: #0056b3; /* Darker blue on hover */
}
  </style>
  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/style.css">
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

</head>
<body>
  <header>
    <div class="nav">
      <a href="catfood.php" class="logo">
        Dog Food
      </a>
    </div>
  </header>
  <div class="container">
    <button onclick="goBack()" class="back-button">Back</button>
    <div class="shop-content">


      <div class="food-box">
        <div class="pic">
          <img src="upload/c9.jpg" class="food-img">
        </div>
        <h2 class="food-title">Pedigree Wet Food</h2>
        <span class="food-price">₱ 120</span>
      </div>


      <div class="food-box">
        <div class="pic"><img src="upload/c10.jpg" class="food-img"></div>
        <h2 class="food-title">Pedigree Wet Food</h2>
        <span class="food-price">₱ 120</span>
      </div>
  
      <div class="food-box">
        <div class="pic"><img src="upload/c11.jpg" class="food-img"></div>
        <h2 class="food-title">Pedigree Wet Food</h2>
        <span class="food-price">₱ 120</span>
      </div>
  
      <div class="food-box">
        <div class="pic"><img src="upload/c12.jpg" class="food-img"></div>
        <h2 class="food-title">Pedigree Wet Food</h2>
        <span class="food-price">₱ 120</span>
      </div>
  
       <div class="food-box">
        <div class="pic"><img src="upload/d1.jpg" class="food-img"></div>
        <h2 class="food-title">Pedigree Meat Jerky</h2>
        <span class="food-price">₱ 100</span>
      </div>

       <div class="food-box">
        <div class="pic"><img src="upload/d8.jpg" class="food-img"></div>
        <h2 class="food-title">ROyal Canin shih Tzu</h2>
        <span class="food-price">₱ 1,000</span>
      </div>

       <div class="food-box">
        <div class="pic"><img src="upload/d9.jpg" class="food-img"></div>
        <h2 class="food-title">ROyal Canin shih Tzu</h2>
        <span class="food-price">₱ 1,000</span>
      </div>

       <div class="food-box">
        <div class="pic"><img src="upload/d10.jpg" class="food-img"></div>
        <h2 class="food-title">Royal Canin Poodle</h2>
        <span class="food-price">₱ 1,100</span>
      </div>

       <div class="food-box">
        <div class="pic"><img src="upload/d11.jpg" class="food-img"></div>
        <h2 class="food-title">Royal Canin Mini Indor Adult</h2>
        <span class="food-price">₱ 1,200</span>
      </div>

       <div class="food-box">
        <div class="pic"><img src="upload/d12.jpg" class="food-img"></div>
        <h2 class="food-title">Royal Canin Puppy</h2>
        <span class="food-price">₱ 1,000</span>
      </div>

       <div class="food-box">
        <div class="pic"><img src="upload/d13.jpg" class="food-img"></div>
        <h2 class="food-title">Pedigree Adult</h2>
        <span class="food-price">₱ 500</span>
      </div>

       <div class="food-box">
        <div class="pic"><img src="upload/d14.jpg" class="food-img"></div>
        <h2 class="food-title">Pedigree Mni</h2>
        <span class="food-price">₱ 300</span>
      </div>

       <div class="food-box">
        <div class="pic"><img src="upload/d15.jpg" class="food-img"></div>
        <h2 class="food-title">Pedigree Puppy</h2>
        <span class="food-price">₱ 360</span>
      </div>

       <div class="food-box">
        <div class="pic"><img src="upload/d16.jpg" class="food-img"></div>
        <h2 class="food-title">Happy Tummy </h2>
        <span class="food-price">₱ 500</span>
      </div>

       <div class="food-box">
        <div class="pic"><img src="upload/d17.jpg" class="food-img"></div>
        <h2 class="food-title">Beef Teryaki</h2>
        <span class="food-price">₱ 900</span>
      </div>

       <div class="food-box">
        <div class="pic"><img src="upload/d18.jpg" class="food-img"></div>
        <h2 class="food-title">Aozi Lamb</h2>
        <span class="food-price">₱ 1,050</span>
      </div>

       <div class="food-box">
        <div class="pic"><img src="upload/d19.jpg" class="food-img"></div>
        <h2 class="food-title">Aozi Salmon</h2>
        <span class="food-price">₱ 1,100</span>
      </div>

       <div class="food-box">
        <div class="pic"><img src="upload/d20.jpg" class="food-img"></div>
        <h2 class="food-title">Royal Canin Maxi Adult</h2>
        <span class="food-price">₱ 1,300</span>
      </div>

       <div class="food-box">
        <div class="pic"><img src="upload/d21.jpg" class="food-img"></div>
        <h2 class="food-title">Royal Canin Puppy</h2>
        <span class="food-price">₱ 1,000</span>
      </div>

       <div class="food-box">
        <div class="pic"><img src="upload/d22.jpg" class="food-img"></div>
        <h2 class="food-title">Royal Canin Cardiac</h2>
        <span class="food-price">₱ 400</span>
      </div>
  




    </div>
  </div>
  <script src="js/script.js"></script>
</body>
</html>

  <script>
      const btnCart=document.querySelector('#cart-icon');
const cart=document.querySelector('.cart');
const btnClose=document.querySelector('#cart-close');

btnCart.addEventListener('click',()=>{
  cart.classList.add('cart-active');
});

btnClose.addEventListener('click',()=>{
  cart.classList.remove('cart-active');
});

document.addEventListener('DOMContentLoaded',loadFood);

function loadFood(){
  loadContent();

}

function loadContent(){
  //Remove Food Items  From Cart
  let btnRemove=document.querySelectorAll('.cart-remove');
  btnRemove.forEach((btn)=>{
    btn.addEventListener('click',removeItem);
  });

  //Product Item Change Event
  let qtyElements=document.querySelectorAll('.cart-quantity');
  qtyElements.forEach((input)=>{
    input.addEventListener('change',changeQty);
  });

  //Product Cart
  
  let cartBtns=document.querySelectorAll('.add-cart');
  cartBtns.forEach((btn)=>{
    btn.addEventListener('click',addCart);
  });

  updateTotal();
}


//Remove Item
function removeItem(){
  if(confirm('Are Your Sure to Remove')){
    let title=this.parentElement.querySelector('.cart-food-title').innerHTML;
    itemList=itemList.filter(el=>el.title!=title);
    this.parentElement.remove();
    loadContent();
  }
}

//Change Quantity
function changeQty(){
  if(isNaN(this.value) || this.value<1){
    this.value=1;
  }
  loadContent();
}

let itemList=[];

//Add Cart
function addCart(){
 let food=this.parentElement;
 let title=food.querySelector('.food-title').innerHTML;
 let price=food.querySelector('.food-price').innerHTML;
 let imgSrc=food.querySelector('.food-img').src;
 //console.log(title,price,imgSrc);
 
 let newProduct={title,price,imgSrc}

 //Check Product already Exist in Cart
 if(itemList.find((el)=>el.title==newProduct.title)){
  alert("Product Already added in Cart");
  return;
 }else{
  itemList.push(newProduct);
 }


let newProductElement= createCartProduct(title,price,imgSrc);
let element=document.createElement('div');
element.innerHTML=newProductElement;
let cartBasket=document.querySelector('.cart-content');
cartBasket.append(element);
loadContent();
}


function createCartProduct(title,price,imgSrc){

  return `
  <div class="cart-box">
  <img src="${imgSrc}" class="cart-img">
  <div class="detail-box">
    <div class="cart-food-title">${title}</div>
    <div class="price-box">
      <div class="cart-price">${price}</div>
       <div class="cart-amt">${price}</div>
   </div>
    <input type="number" value="1" class="cart-quantity">
  </div>
  <ion-icon name="trash" class="cart-remove"></ion-icon>
</div>
  `;
}

function updateTotal()
{
  const cartItems=document.querySelectorAll('.cart-box');
  const totalValue=document.querySelector('.total-price');

  let total=0;

  cartItems.forEach(product=>{
    let priceElement=product.querySelector('.cart-price');
    let price=parseFloat(priceElement.innerHTML.replace("Rs.",""));
    let qty=product.querySelector('.cart-quantity').value;
    total+=(price*qty);
    product.querySelector('.cart-amt').innerText="Rs."+(price*qty);

  });

  totalValue.innerHTML='Rs.'+total;


  // Add Product Count in Cart Icon

  const qty=document.querySelector('.qty');
  let count=itemList.length;
  qty.innerHTML=count;

  if(count==0){
    qty.style.display='none';
  }else{
    qty.style.display='block';
  }


}

 function goBack() {
        window.history.back();
    }
  </script>
</body>
</html>