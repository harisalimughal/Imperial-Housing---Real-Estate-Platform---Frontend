<footer class="bg-black text-white py-12">
  <div class="max-w-screen-xl mx-auto px-8 md:px-12">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 items-start">
      
      <!-- Logo & Info -->
      <div class="flex flex-col items-start">
        <img src="/public/assets/images/logo.png" alt="Imperial Housing" class="mb-0 w-40 h-40 md:w-44 md:h-44 object-contain">
        <div>
          <p class="text-gray-300 text-sm leading-relaxed max-w-xs">
            Where housing meets care
          </p>
        </div>
      </div>

    <!-- Quick Links -->
    <div class="md:mt-6">
  <h3 class="text-yellow-500 text-lg font-semibold mb-4">Quick Links</h3>
  <ul class="space-y-2">
          <li><a href="/src/pages/index.php" class="text-gray-300 hover:brand-yellow">Home</a></li>
          <li><a href="/src/pages/about.php" class="text-gray-300 hover:brand-yellow">About Us</a></li>
          <li><a href="/src/pages/hmo.php" class="text-gray-300 hover:brand-yellow">HMO Services</a></li>
          <li><a href="/src/pages/tenants.php" class="text-gray-300 hover:brand-yellow">Tenants</a></li>
        </ul>
      </div>

    <!-- Services -->
    <div class="md:mt-6">
  <h3 class="text-yellow-500 text-lg font-semibold mb-4">Additional Links</h3>
  <ul class="space-y-2">
          <li><a href="/src/pages/design.php" class="text-gray-300 hover:brand-yellow">Property Management</a></li>
          <li><a href="/src/pages/hmo.php" class="text-gray-300 hover:brand-yellow">HMO (Supported Accomodation)</a></li>
          <li><a href="/src/pages/tenants.php" class="text-gray-300 hover:brand-yellow">Tenants</a></li>
          <li><a href="/src/pages/about.php" class="text-gray-300 hover:brand-yellow">About Us</a></li>
        </ul>
      </div>

    <!-- Contact -->
    <div class="md:mt-6">
  <h3 class="text-yellow-500 text-lg font-semibold mb-4">Contact</h3>
  <ul class="space-y-3">
          <li class="flex items-start space-x-3">
            <img src="/public/assets/images/locationIcon.png" alt="Location" class="w-6 h-6 mt-1 flex-shrink-0 object-contain" />
            <div>
              <p class="text-gray-300 text-sm">1250 Coventry Road, B25 8BJ, Birmingham</p>
            </div>
          </li>
          <li class="flex items-center space-x-3">
            <img src="/public/assets/images/phoneIcon.png" alt="Phone" class="w-6 h-6 flex-shrink-0 object-contain" />
            <span class="text-gray-300 text-sm">07557538026</span>
          </li>
          <li class="flex items-center space-x-3">
            <img src="/public/assets/images/emailIcon.png" alt="Email" class="w-6 h-6 flex-shrink-0 object-contain" />
            <a href="mailto:info@imperialhousing.co.uk" class="text-gray-300 hover:brand-yellow text-sm">imperialhousingwm@gmail.com</a>
          </li>
        </ul>
      </div>

    </div>
  </div>
</footer>

<!-- WhatsApp Floating Button -->
<a href="https://wa.me/447947861998" target="_blank" rel="noopener noreferrer" class="whatsapp-float" aria-label="Chat on WhatsApp">
  <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z" fill="white"/>
    <path d="M20.52 3.449C18.24 1.245 15.24 0 12.045 0 5.463 0 .104 5.334.101 11.893c0 2.096.549 4.14 1.595 5.945L0 24l6.335-1.652c1.746.943 3.71 1.444 5.71 1.447h.006c6.585 0 11.946-5.336 11.949-11.896 0-3.176-1.24-6.165-3.48-8.45zm-8.475 18.297c-1.776 0-3.517-.477-5.033-1.377l-.36-.214-3.742.98 1-3.648-.235-.374c-.99-1.574-1.512-3.393-1.512-5.26.003-5.45 4.437-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898 1.867 1.869 2.893 4.352 2.892 6.993-.003 5.451-4.436 9.886-9.886 9.886z" fill="white"/>
  </svg>
</a>

<style>
  .whatsapp-float {
    position: fixed;
    bottom: 30px;
    right: 30px;
    width: 70px;
    height: 70px;
    background: #25D366;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
    transition: all 0.3s ease;
    cursor: pointer;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
  }

  .whatsapp-float:hover {
    transform: scale(1.1);
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
  }

  .whatsapp-float svg {
    width: 40px;
    height: 40px;
  }

  /* Responsive adjustments */
  @media (max-width: 768px) {
    .whatsapp-float {
      bottom: 20px;
      right: 20px;
      width: 60px;
      height: 60px;
    }

    .whatsapp-float svg {
      width: 35px;
      height: 35px;
    }
  }
</style>

<!-- Include main JavaScript -->
<script src="/public/assets/js/main.js"></script>