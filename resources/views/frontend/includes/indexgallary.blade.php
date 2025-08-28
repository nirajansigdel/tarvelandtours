<style>
.gallery-section {
  padding: 80px 0;
  position: relative;
  overflow: hidden;
}

.gallery-section::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 4px;
  opacity: 0.3;
}

.section-header {
  text-align: center;
  margin-bottom: 60px;
  position: relative;
}

.section-header h1 {
  margin-bottom: 20px;
  position: relative;
  display: inline-block;
}

.section-header .xs-text {
  color: #6c757d;
  max-width: 600px;
  margin: 0 auto;
}

.gallery-wrapper {
  position: relative;
}

.gallery-masonry {
  display: flex;
  flex-wrap: wrap;
  margin: -10px;
}

.gallery-item {
  width: calc(33.333% - 20px);
  margin: 10px;
  position: relative;
  overflow: hidden;
  border-radius: 4px;
  transform-origin: center;
  transition: all 0.4s ease;
}

.gallery-item:nth-child(3n+1) {
  transform: rotate(-1deg);
}

.gallery-item:nth-child(3n+2) {
  transform: rotate(1deg);
}

.gallery-item:nth-child(3n+3) {
  transform: rotate(-0.5deg);
}

.gallery-item:hover {
  transform: rotate(0) scale(1.02);
  z-index: 2;
}

.gallery-img {
  width: 100%;
  height: 280px;
  object-fit: cover;
  transition: all 0.4s ease;
}

.gallery-content {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  padding: 20px;
  background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
  transform: translateY(100%);
  transition: transform 0.4s ease;
}

.view-btn {
  color: white;
  font-size: 14px;
  text-decoration: none;
  position: relative;
  padding-bottom: 2px;
}

.view-btn::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 1px;
  background: white;
  transform: scaleX(0);
  transform-origin: right;
  transition: transform 0.3s ease;
}

.gallery-item:hover .gallery-content {
  transform: translateY(0);
}

.gallery-item:hover .view-btn::after {
  transform: scaleX(1);
  transform-origin: left;
}

@media (max-width: 991px) {
  .gallery-item {
    width: calc(50% - 20px);
  }
}

@media (max-width: 576px) {
  .gallery-item {
    width: calc(100% - 20px);
  }
  
  .gallery-section {
    padding: 60px 0;
  }
}
</style>

<section class="gallery-section">
  <div class="container">
    <div class="section-header">
      <h1 class="extralarger blackhighlight">Photo Gallery</h1>
      <p class="xs-text">Journey through our moments of inspiration, achievement, and community spirit</p>
    </div>
  <div id="imageContent" class="gallery-wrapper">
            <div class="gallery-masonry">
                @foreach($images->sortByDesc('updated_at') as $image)
                    <div class="gallery-item" data-category="{{ $image->category->slug ?? 'uncategorized' }}">
                        <div class="gallery-inner">
                            @if(!empty($image->img) && is_array($image->img))
                                <img src="{{ asset(last($image->img)) }}" 
                                     alt="{{ $image->title }}"
                                     class="gallery-img">
                            @endif
                            <div class="gallery-content">
                                <h5 class="image-title text-white mb-3">{{ $image->title }}</h5>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="{{ route('singleImage', $image->slug) }}" class="view-btn">
                                        View More Images →
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

  </div>
</section>
