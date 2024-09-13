<nav class="bg-slate-50 mb-96">
    <ul>· 연도별
        <div class="accordian">
            <!-- 80년대 -->
            <div class="accordion-item">
                <button class="accordion-button">1980's</button>
                <div class="accordion-content">
                    <a href="#">1982</a>
                    <a href="#">1983</a>
                    <a href="#">1984</a>
                    <a href="#">1985</a>
                    <a href="#">1986</a>
                    <a href="#">1987</a>
                    <a href="#">1988</a>
                    <a href="#">1989</a>
                </div>
            </div>
            <!-- 90년대 -->
            <div class="accordion-item">
                <button class="accordion-button">1990's</button>
                <div class="accordion-content">
                    <a href="#">1990</a>
                    <a href="#">1991</a>
                    <a href="#">1992</a>
                    <a href="#">1993</a>
                    <a href="#">1994</a>
                    <a href="#">1995</a>
                    <a href="#">1996</a>
                    <a href="#">1997</a>
                    <a href="#">1998</a>
                    <a href="#">1999</a>
                </div>
            </div>
            <!-- 2000년대 -->
            <div class="accordion-item">
                <button class="accordion-button">2000's</button>
                <div class="accordion-content">
                    <a href="#">2000</a>
                    <a href="#">2001</a>
                    <a href="#">2002</a>
                    <a href="#">2003</a>
                    <a href="#">2004</a>
                    <a href="#">2005</a>
                    <a href="#">2006</a>
                    <a href="#">2007</a>
                    <a href="#">2008</a>
                    <a href="#">2009</a>
                </div>
            </div>
            <!-- 2010년대 -->
            <div class="accordion-item">
                <button class="accordion-button">2010's</button>
                <div class="accordion-content">
                    <a href="#">2010</a>
                    <a href="#">2011</a>
                    <a href="#">2012</a>
                    <a href="#">2013</a>
                    <a href="#">2014</a>
                    <a href="#">2015</a>
                    <a href="#">2016</a>
                    <a href="#">2017</a>
                    <a href="#">2018</a>
                    <a href="#">2019</a>
                </div>
            </div>
            <!-- 2020년대 -->
            <div class="accordion-item">
                <button class="accordion-button">2020's</button>
                <div class="accordion-content">
                    <a href="#">2020</a>
                    <a href="#">2021</a>
                    <a href="#">2022</a>
                    <a href="#">2023</a>
                </div>
            </div>
        </div>
    </ul>
</nav>
<div class="container">
    <div>
        <h1 class="text-center text-4xl mb-10">notice</h1>
        <table class="table table-striped">
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var accordionButtons = document.querySelectorAll('.accordion-button');

        accordionButtons.forEach(button => {
            button.addEventListener('click', function () {
                // 현재 버튼에 active 클래스 추가
                var content = this.nextElementSibling;
                if (content.style.display === "block") {
                    content.style.display = "none";
                } else {
                    content.style.display = "block";
                }
            });
        });
    });
</script>
