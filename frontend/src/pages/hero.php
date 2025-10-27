<?php
/*
 * Reusable hero partial
 * Accepts optional variables before include:
 *   $heroTitle    - HTML string for the hero heading (default: landing heading)
 *   $heroSubtitle - optional smaller subtitle (default: empty)
 *   $heroImages   - comma-separated list of hero image URLs (default: hero1,hero2)
 */

$heroTitle = isset($heroTitle) ? $heroTitle : "Find Real Estate and<br>Get Your Dream Space";
$heroSubtitle = isset($heroSubtitle) ? $heroSubtitle : '';
$heroImages = isset($heroImages) ? $heroImages : '/public/assets/images/hero1.png,/public/assets/images/hero2.png';

$imagesArr = array_values(array_filter(array_map('trim', explode(',', $heroImages))));
$initialImage = !empty($imagesArr) ? $imagesArr[0] : '/public/assets/images/hero1.png';
?>
<section class="relative">
  <div id="heroRoot" data-hero-images="<?php echo htmlspecialchars($heroImages); ?>" class="h-[80vh] bg-cover bg-center" style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('<?php echo htmlspecialchars($initialImage); ?>')">
    <div class="h-full flex items-center justify-center md:justify-start text-center md:text-left text-white px-6">
      <div class="max-w-4xl md:pl-32">
        <h1 class="text-5xl md:text-[60px] font-bold mb-4"><?php echo $heroTitle; ?></h1>
        <?php if (!empty($heroSubtitle)): ?>
          <p class="text-xl opacity-90 mt-2"><?php echo $heroSubtitle; ?></p>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <!-- Hero nav arrows -->
  <button id="heroPrev" aria-label="Previous" class="absolute left-8 top-1/2 transform -translate-y-1/2 p-12  hover:bg-opacity-40 rounded-full text-white z-20">
    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
  </button>
  <button id="heroNext" aria-label="Next" class="absolute right-8 top-1/2 transform -translate-y-1/2 p-12  hover:bg-opacity-40 rounded-full text-white z-20">
    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
  </button>
</section>
