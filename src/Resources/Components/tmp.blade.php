<main class="bd-main order-1 px-4 border">
      <div class="bd-intro pt-2 ps-lg-2">
        <div class="d-md-flex flex-md-row-reverse align-items-center justify-content-between">
          <a class="btn btn-sm btn-bd-light mb-3 mb-md-0 rounded-2" href="https://github.com/twbs/bootstrap/blob/v5.2.3/site/content/docs/5.2/content/images.md" title="View and edit this file on GitHub" target="_blank" rel="noopener">
            View on GitHub
          </a>
          <h1 class="bd-title mb-0" id="content">Images</h1>
        </div>
        <p class="bd-lead">Documentation and examples for opting images into responsive behavior (so they never become wider than their parent) and add lightweight styles to them—all via classes.</p>
        <script async src="https://cdn.carbonads.com/carbon.js?serve=CKYIKKJL&placement=getbootstrapcom" id="_carbonads_js"></script>

      </div>


        <div class="bd-toc mt-3 mb-5 my-lg-0 ps-xl-3 mb-lg-5 text-muted">
          <button class="btn btn-link link-dark p-md-0 mb-2 mb-md-0 text-decoration-none bd-toc-toggle d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#tocContents" aria-expanded="false" aria-controls="tocContents">
            On this page
            <svg class="bi d-md-none ms-2" aria-hidden="true"><use xlink:href="#chevron-expand"></use></svg>
          </button>
          <strong class="d-none d-md-block h6 my-2">On this page</strong>
          <hr class="d-none d-md-block my-2">
          <div class="collapse bd-toc-collapse" id="tocContents">
            <nav id="TableOfContents">
  <ul>
    <li><a href="#responsive-images">Responsive images</a></li>
    <li><a href="#image-thumbnails">Image thumbnails</a></li>
    <li><a href="#aligning-images">Aligning images</a></li>
    <li><a href="#picture">Picture</a></li>
    <li><a href="#sass">Sass</a>
      <ul>
        <li><a href="#variables">Variables</a></li>
      </ul>
    </li>
  </ul>
</nav>
          </div>
        </div>


      <div class="bd-content ps-lg-2">


        <h2 id="responsive-images">Responsive images <a class="anchor-link" href="#responsive-images" aria-label="Link to this section: Responsive images"></a></h2>
<p>Images in Bootstrap are made responsive with <code>.img-fluid</code>. This applies <code>max-width: 100%;</code> and <code>height: auto;</code> to the image so that it scales with the parent width.</p>
<div class="bd-example-snippet bd-code-snippet"><div class="bd-example">
<svg class="bd-placeholder-img bd-placeholder-img-lg img-fluid" width="100%" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Responsive image" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Responsive image</text></svg>

</div><div class="d-flex align-items-center highlight-toolbar bg-light ps-3 pe-2 py-1">
        <small class="font-monospace text-muted text-uppercase">html</small>
        <div class="d-flex ms-auto">
          <button type="button" class="btn-edit text-nowrap" title="Try it on StackBlitz">
            <svg class="bi" role="img" aria-label="Try it"><use xlink:href="#lightning-charge-fill"/></svg>
          </button>
          <button type="button" class="btn-clipboard mt-0 me-0" title="Copy to clipboard">
            <svg class="bi" role="img" aria-label="Copy"><use xlink:href="#clipboard"/></svg>
          </button>
        </div>
      </div><div class="highlight"><pre tabindex="0" class="chroma"><code class="language-html" data-lang="html"><span class="line"><span class="cl"><span class="p">&lt;</span><span class="nt">img</span> <span class="na">src</span><span class="o">=</span><span class="s">&#34;...&#34;</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;img-fluid&#34;</span> <span class="na">alt</span><span class="o">=</span><span class="s">&#34;...&#34;</span><span class="p">&gt;</span></span></span></code></pre></div></div>

<h2 id="image-thumbnails">Image thumbnails <a class="anchor-link" href="#image-thumbnails" aria-label="Link to this section: Image thumbnails"></a></h2>
<p>In addition to our <a href="/docs/5.2/utilities/borders/">border-radius utilities</a>, you can use <code>.img-thumbnail</code> to give an image a rounded 1px border appearance.</p>
<div class="bd-example-snippet bd-code-snippet"><div class="bd-example">
<svg class="bd-placeholder-img img-thumbnail" width="200" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="A generic square placeholder image with a white border around it, making it resemble a photograph taken with an old instant camera: 200x200" preserveAspectRatio="xMidYMid slice" focusable="false"><title>A generic square placeholder image with a white border around it, making it resemble a photograph taken with an old instant camera</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em">200x200</text></svg>

</div><div class="d-flex align-items-center highlight-toolbar bg-light ps-3 pe-2 py-1">
        <small class="font-monospace text-muted text-uppercase">html</small>
        <div class="d-flex ms-auto">
          <button type="button" class="btn-edit text-nowrap" title="Try it on StackBlitz">
            <svg class="bi" role="img" aria-label="Try it"><use xlink:href="#lightning-charge-fill"/></svg>
          </button>
          <button type="button" class="btn-clipboard mt-0 me-0" title="Copy to clipboard">
            <svg class="bi" role="img" aria-label="Copy"><use xlink:href="#clipboard"/></svg>
          </button>
        </div>
      </div><div class="highlight"><pre tabindex="0" class="chroma"><code class="language-html" data-lang="html"><span class="line"><span class="cl"><span class="p">&lt;</span><span class="nt">img</span> <span class="na">src</span><span class="o">=</span><span class="s">&#34;...&#34;</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;img-thumbnail&#34;</span> <span class="na">alt</span><span class="o">=</span><span class="s">&#34;...&#34;</span><span class="p">&gt;</span></span></span></code></pre></div></div>

<h2 id="aligning-images">Aligning images <a class="anchor-link" href="#aligning-images" aria-label="Link to this section: Aligning images"></a></h2>
<p>Align images with the <a href="/docs/5.2/utilities/float/">helper float classes</a> or <a href="/docs/5.2/utilities/text/#text-alignment">text alignment classes</a>. <code>block</code>-level images can be centered using <a href="/docs/5.2/utilities/spacing/#horizontal-centering">the <code>.mx-auto</code> margin utility class</a>.</p>
<div class="bd-example-snippet bd-code-snippet"><div class="bd-example">
<svg class="bd-placeholder-img rounded float-start" width="200" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 200x200" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em">200x200</text></svg>

<svg class="bd-placeholder-img rounded float-end" width="200" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 200x200" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em">200x200</text></svg>

</div><div class="d-flex align-items-center highlight-toolbar bg-light ps-3 pe-2 py-1">
        <small class="font-monospace text-muted text-uppercase">html</small>
        <div class="d-flex ms-auto">
          <button type="button" class="btn-edit text-nowrap" title="Try it on StackBlitz">
            <svg class="bi" role="img" aria-label="Try it"><use xlink:href="#lightning-charge-fill"/></svg>
          </button>
          <button type="button" class="btn-clipboard mt-0 me-0" title="Copy to clipboard">
            <svg class="bi" role="img" aria-label="Copy"><use xlink:href="#clipboard"/></svg>
          </button>
        </div>
      </div><div class="highlight"><pre tabindex="0" class="chroma"><code class="language-html" data-lang="html"><span class="line"><span class="cl"><span class="p">&lt;</span><span class="nt">img</span> <span class="na">src</span><span class="o">=</span><span class="s">&#34;...&#34;</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;rounded float-start&#34;</span> <span class="na">alt</span><span class="o">=</span><span class="s">&#34;...&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl"><span class="p">&lt;</span><span class="nt">img</span> <span class="na">src</span><span class="o">=</span><span class="s">&#34;...&#34;</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;rounded float-end&#34;</span> <span class="na">alt</span><span class="o">=</span><span class="s">&#34;...&#34;</span><span class="p">&gt;</span></span></span></code></pre></div></div>

<div class="bd-example-snippet bd-code-snippet"><div class="bd-example">
<svg class="bd-placeholder-img rounded mx-auto d-block" width="200" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 200x200" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em">200x200</text></svg>

</div><div class="d-flex align-items-center highlight-toolbar bg-light ps-3 pe-2 py-1">
        <small class="font-monospace text-muted text-uppercase">html</small>
        <div class="d-flex ms-auto">
          <button type="button" class="btn-edit text-nowrap" title="Try it on StackBlitz">
            <svg class="bi" role="img" aria-label="Try it"><use xlink:href="#lightning-charge-fill"/></svg>
          </button>
          <button type="button" class="btn-clipboard mt-0 me-0" title="Copy to clipboard">
            <svg class="bi" role="img" aria-label="Copy"><use xlink:href="#clipboard"/></svg>
          </button>
        </div>
      </div><div class="highlight"><pre tabindex="0" class="chroma"><code class="language-html" data-lang="html"><span class="line"><span class="cl"><span class="p">&lt;</span><span class="nt">img</span> <span class="na">src</span><span class="o">=</span><span class="s">&#34;...&#34;</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;rounded mx-auto d-block&#34;</span> <span class="na">alt</span><span class="o">=</span><span class="s">&#34;...&#34;</span><span class="p">&gt;</span></span></span></code></pre></div></div>

<div class="bd-example-snippet bd-code-snippet"><div class="bd-example">
<div class="text-center">
  <svg class="bd-placeholder-img rounded" width="200" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 200x200" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em">200x200</text></svg>

</div>
</div><div class="d-flex align-items-center highlight-toolbar bg-light ps-3 pe-2 py-1">
        <small class="font-monospace text-muted text-uppercase">html</small>
        <div class="d-flex ms-auto">
          <button type="button" class="btn-edit text-nowrap" title="Try it on StackBlitz">
            <svg class="bi" role="img" aria-label="Try it"><use xlink:href="#lightning-charge-fill"/></svg>
          </button>
          <button type="button" class="btn-clipboard mt-0 me-0" title="Copy to clipboard">
            <svg class="bi" role="img" aria-label="Copy"><use xlink:href="#clipboard"/></svg>
          </button>
        </div>
      </div><div class="highlight"><pre tabindex="0" class="chroma"><code class="language-html" data-lang="html"><span class="line"><span class="cl"><span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;text-center&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;</span><span class="nt">img</span> <span class="na">src</span><span class="o">=</span><span class="s">&#34;...&#34;</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;rounded&#34;</span> <span class="na">alt</span><span class="o">=</span><span class="s">&#34;...&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl"><span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span></span></span></code></pre></div></div>

<h2 id="picture">Picture <a class="anchor-link" href="#picture" aria-label="Link to this section: Picture"></a></h2>
<p>If you are using the <code>&lt;picture&gt;</code> element to specify multiple <code>&lt;source&gt;</code> elements for a specific <code>&lt;img&gt;</code>, make sure to add the <code>.img-*</code> classes to the <code>&lt;img&gt;</code> and not to the <code>&lt;picture&gt;</code> tag.</p>
<div class="highlight"><pre tabindex="0" class="chroma"><code class="language-html" data-lang="html"><span class="line"><span class="cl"><span class="p">&lt;</span><span class="nt">picture</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;</span><span class="nt">source</span> <span class="na">srcset</span><span class="o">=</span><span class="s">&#34;...&#34;</span> <span class="na">type</span><span class="o">=</span><span class="s">&#34;image/svg+xml&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;</span><span class="nt">img</span> <span class="na">src</span><span class="o">=</span><span class="s">&#34;...&#34;</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;img-fluid img-thumbnail&#34;</span> <span class="na">alt</span><span class="o">=</span><span class="s">&#34;...&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl"><span class="p">&lt;/</span><span class="nt">picture</span><span class="p">&gt;</span>
</span></span></code></pre></div><h2 id="sass">Sass <a class="anchor-link" href="#sass" aria-label="Link to this section: Sass"></a></h2>
<h3 id="variables">Variables <a class="anchor-link" href="#variables" aria-label="Link to this section: Variables"></a></h3>
<p>Variables are available for image thumbnails.</p>
<div class="highlight"><pre tabindex="0" class="chroma"><code class="language-scss" data-lang="scss"><span class="line"><span class="cl"><span class="nv">$thumbnail-padding</span><span class="o">:</span>                 <span class="mf">.25</span><span class="kt">rem</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="nv">$thumbnail-bg</span><span class="o">:</span>                      <span class="nv">$body-bg</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="nv">$thumbnail-border-width</span><span class="o">:</span>            <span class="nv">$border-width</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="nv">$thumbnail-border-color</span><span class="o">:</span>            <span class="nf">var</span><span class="p">(</span><span class="o">--</span><span class="si">#{</span><span class="nv">$prefix</span><span class="si">}</span><span class="n">border-color</span><span class="p">);</span>
</span></span><span class="line"><span class="cl"><span class="nv">$thumbnail-border-radius</span><span class="o">:</span>           <span class="nv">$border-radius</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="nv">$thumbnail-box-shadow</span><span class="o">:</span>              <span class="nv">$box-shadow-sm</span><span class="p">;</span>
</span></span></code></pre></div>

      </div>
    </main>
