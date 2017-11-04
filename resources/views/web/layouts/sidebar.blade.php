<div class="sidebar">
    <div class="gadget">
        <h2>文章分类</h2>
        <div class="clr"></div>
        @if(isset($cateList) && $cateList)
            @foreach($cateList as $item)
                <ul class="sb_menu">
                    <li>
                        <a href="#">{{$item['name']}}</a>
                    </li>
                    @if(isset($item['child']) && $item['child'])
                        @foreach($item['child'] as $two)
                            <ul class="sb_menu">
                                <li style="text-indent: 20px;"><a href="#">{{$two['name']}}</a></li>
                                @if(isset($two['child']) && $two['child'])
                                    @foreach($two['child'] as $three)
                                        <ul class="sb_menu">
                                            <li style="text-indent: 20px;"><a href="#">{{$three['name']}}</a></li>
                                        </ul>
                                    @endforeach
                                @endif
                            </ul>
                        @endforeach
                    @endif
                </ul>
            @endforeach
        @endif
    </div>
    <div class="gadget">
        <h2><span>阅读排行</span></h2>
        <div class="clr"></div>
        <ul class="ex_menu">
            <li><a href="#" title="Website Templates">DreamTemplate</a><br />
                Over 6,000+ Premium Web Templates</li>
            <li><a href="#" title="WordPress Themes">TemplateSOLD</a><br />
                Premium WordPress &amp; Joomla Themes</li>
            <li><a href="#" title="Affordable Hosting">ImHosted.com</a><br />
                Affordable Web Hosting Provider</li>
            <li><a href="#" title="Stock Icons">MyVectorStore</a><br />
                Royalty Free Stock Icons</li>
            <li><a href="#" title="Website Builder">Evrsoft</a><br />
                Website Builder Software &amp; Tools</li>
            <li><a href="#" title="CSS Templates">CSS Hub</a><br />
                Premium CSS Templates</li>
        </ul>
    </div>
    <div class="gadget">
        <h2>Wise Words</h2>
        <div class="clr"></div>
        <p>   <img src="{{URL::asset('')}}static/web/images/test_1.gif" alt="image" width="18" height="17" /> <em>We can let circumstances rule us, or we can take charge and rule our lives from within </em>.<img src="images/test_2.gif" alt="image" width="18" height="17" /></p>
        <p style="float:right;"><strong>Earl Nightingale</strong></p>
    </div>
</div>