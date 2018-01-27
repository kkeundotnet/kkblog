ㄲ블로그
======

작은 블로그 툴.

설치 및 설정
----------

1.  `git clone https://github.com/kkeundotnet/kkblog.git`

2.  `./configure`

3.  `config.php` 수정

    *   `BLOG_TITLE`: 블로그 제목
    *   `BLOG_DESC`: 짧은 블로그 설명
    *   `BASE_URL`: 블로그 사이트 주소
    *   `ENABLE_DISQUS`: [Disqus][disqus] 댓글 사용 여부
    *   `ENABLE_KKOMENT`: [꼬멘트][kkoment] 댓글 사용 여부
    *   `DISQUS_ID`: [Disqus][disqus] 아이디

글 쓰기
------

`_post/category/YYYY-MM-DD-post-title.md`에
마크다운([PHP Markdown Extra][markdown]) 형식의 글 작성

*   **파일 이름은 반드시 `YYYY-MM-DD-post-title.md`이어야 함.**

    * `2016-05-08-hi-everyone.md` (o)
    * `2016-5-8-hi-everyone.md` (x)
    * `2016-05-08-hi-everyone.markdown` (x)
    * `160508-hi-everyone.md` (x)

*   **마크다운 파일의 처음은 반드시 `<h1>` 형식의 제목이어야 함.**

    (예1)  
    ``````
    글 제목
    =========
    ``````

    (예2)  
    ``````
    # 글 제목
    ``````

*   `_post/draft/`에 초안 작성  
    작성된 초안은 `BASE_URL/draft`에서 확인 가능함.

*   `![그림 이름](그림 주소){.w500}`으로 그림 추가  
    그림 넓이 설정을 위해 `.w200`, `.w300`, ..., `.w600`까지
    `css/kkblog.css`에서 제공함.

세부 설정
-------

*   `_src/header.php`: HTML 헤더
*   `_src/title.php`: 블로그 페이지 위쪽
*   `_src/footer.php`: 블로그 페이지 아래쪽

라이선스
------

이 프로그램은 퍼블릭 도메인으로 공개됩니다.

[disqus]: https://disqus.com/
[kkoment]: https://kkoment.kkeun.net/
[markdown]: https://michelf.ca/projects/php-markdown/extra/
