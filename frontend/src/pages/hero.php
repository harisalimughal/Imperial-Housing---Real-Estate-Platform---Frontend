<?php
/*
 * Reusable hero partial
 * Accepts optional variables before include:
 *   $heroTitle    - HTML string for the hero heading (default: landing heading)
 *   $heroSubtitle - optional smaller subtitle (default: empty)
 *   $heroImages   - comma-separated list of hero image URLs (default: hero1,hero2)
 */

$heroTitle = isset($heroTitle) ? $heroTitle : "Your Home. Your Investment.<br>Your Peace of Mind.";
$heroSubtitle = isset($heroSubtitle) ? $heroSubtitle : 'Whether you\'re looking for a quality home or a reliable partner to manage your property, Imperial Housing delivers comfort, returns, and care.';
$heroImages = isset($heroImages) ? $heroImages : '/public/assets/images/hero1.jpg,/public/assets/images/hero2.jpg,/public/assets/images/hero3.jpg,/public/assets/images/hero4.jpg';

$imagesArr = array_values(array_filter(array_map('trim', explode(',', $heroImages))));
$initialImage = !empty($imagesArr) ? $imagesArr[0] : '/public/assets/images/hero1.jpg';
?>
<section class="relative">
  <div id="heroRoot" data-hero-images="<?php echo htmlspecialchars($heroImages); ?>" class="h-[80vh] bg-cover bg-center" style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('<?php echo htmlspecialchars($initialImage); ?>')">
    <div class="h-full flex items-center justify-center md:justify-start text-center md:text-left text-white px-6">
      <div class="max-w-4xl md:pl-32">
        <h1 class="text-5xl md:text-[60px] font-bold mb-4"><?php echo $heroTitle; ?></h1>
        <?php if (!empty($heroSubtitle)): ?>
          <p class="text-xl opacity-90 mt-2"><?php echo $heroSubtitle; ?></p>
        <?php endif; ?>

  <!-- Mobile-only centered arrows (they call the side buttons' handlers) -->
  <div class="md:hidden hero-arrows-mobile flex justify-center gap-4 mt-6">
          <button onclick="document.getElementById('heroPrev').click()" aria-label="Previous" class="p-3 text-white bg-black/10 rounded-full">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
          </button>
          <button onclick="document.getElementById('heroNext').click()" aria-label="Next" class="p-3 text-white bg-black/10 rounded-full">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
          </button>
        </div>
      </div>
    </div>
    <!-- Side arrows for desktop: placed at the edges like before -->
    <button id="heroPrev" aria-label="Previous" class="hidden md:block absolute top-1/2 transform -translate-y-1/2 p-4 z-20 text-white" style="left:-48px;">
      <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
    </button>
    <button id="heroNext" aria-label="Next" class="hidden md:block absolute top-1/2 transform -translate-y-1/2 p-4 z-20 text-white" style="right:-48px;">
      <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
    </button>
  </div>

</section>
