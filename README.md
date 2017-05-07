ㄲ블로그
======

작은 블로그 툴.

설치 및 설정
----------

1.  git clone

2.  `config.php` 수정

    *   `BLOG_TITLE`: 블로그 제목
    *   `BLOG_DESC`: 짧은 블로그 설명
    *   `BASE_URL`: 블로그 사이트 주소  
        **반드시 `/`로 끝나야 함.** (예) `https://blog.kkeun.net/`
    *   `ENABLE_DISQUS`: [Disqus][disqus] 댓글 사용 여부.
    *   `DISQUS_ID`: [Disqus][disqus] 아이디.

글 쓰기
------

`_post/category/YYYY-MM-DD-post-title.md`에 마크다운 형식의 글 작성.

*   **파일 이름은 반드시 `YYYY-MM-DD-post-title.md`이어야 함.**

    * `2016-05-08-hi.md` (o)
    * `2016-5-8-hi.md` (x)
    * `2016-05-08-hi.markdown` (x)
    * `160508-hi.md` (x)

*   **마크다운 파일의 첫 두 줄은 반드시 제목이어야 함.**

    (예)  
    ``````
    나의 첫 글
    =========
    ``````

[disqus]: https://disqus.com/


