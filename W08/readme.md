### <개발 환경 소개>
솔직하게 MariaDB와 MySQL과의 차이가 거의 없어서 어떤 개발 환경을 써도 상관이 없었으나 MariaDB를 배울 때 Visual Studio Code를 사용하고 터미널을 내부에서 사용할 수 있던 점이 편해서 이번 과제 작성에 MariaDB를 사용하게 되었다.

### <발견한 정보>
1) 영화 검색(배우별 출연 영화 & 영화별 출연 배우 검색)
영화 검색을 클릭하면 dvd_select.php로 연결된다. 페이지에는
> SELECT upper(concat(first_name, ' ', last_name)) 'Actor Name' FROM actor LIMIT 30

> SELECT title FROM film LIMIT 30

두 sql문을 통해 배우의 이름과 영화이름이 각각 나온다. 가독성을 높이기 위해
> upper(concat(first_name, ' ', last_name))

를 통해 first_name과 last_name을 자연스럽게 연결해주었다.
이 표를 보고 자신이 검색하기를 원하는 영화배우의 first_name과 last_name을 입력하면 dvd_actor_search.php 페이지로 넘어간다.
> SELECT upper(concat(first_name, ' ', last_name)) 'Actor Name', b.title, b.description
FROM film_actor f, actor a, film b
WHERE f.actor_id = a.actor_id
AND f.film_id = b.film_id
AND a.first_name = '{$filtered_first_name}'
AND a.last_name = '{$filtered_last_name}'


위의 sql문을 통해 해당 배우가 출연하는 영화의 이름과 그 영화의 줄거리가 표로 출력되며 가독성을 높이기 위해 현재 검색중인 배우의 이름이 큰 글씨로 나온다.
만약 데이터베이스 값에 없는 사람의 이름을 입력할 경우 전달되는 값이 없어 페이지 오류가 뜨는 문제를 해결하기 위해 결과값이 없을 경우 출력되는 행의 개수가 없기 때문에 $count 변수로 행의 개수를 센 후 값이 만약 그 값이 0일 경우 별도의 처리 없이 header를 통해 원래 있던 페이지인 dvd_select.php로 돌아가게 된다.
> $count = mysqli_num_rows($result);
    if ($count == 0) { 
        header('Location: dvd_select.php');
    }

또한 아래의 sql문을 통해 first_name과 last_name 중 어느 하나라도 입력 값이 없을 경우에도 값을 다시 입력할 수 있게 dvd_select.php로 돌아가게 된다.
> isset($_POST['first_name']) && isset($_POST['last_name'])


마찬가지로 영화 제목을 title 텍스트박스에 입력할 경우, 영화의 이름과 줄거리가 중심으로 뜨고, 출연한 배우의 이름이 표를 통해 모두 출력된다. dvd_title_search.php파일도 dvd_actor_search.php 파일과 동일하게 row 개수를 세 그 값이 0일 경우 header를 통해 dvd_select.php로 돌아간다.

원하는 정보를 검색한 후 다시 index페이지로 돌아가는 href와, 이전 페이지로 돌아가는 href를 추가해서 메인페이지로 갈 것인지, 영화 검색 페이지로 갈 것인지 선택할 수 있게 했다.

------------
2) 영화 등급, 카테고리를 체크박스를 통해 선택하여 검색
이용한 데이터베이스인 sakila가 DVD 대여 플랫폼을 구현한 것이기 때문에 영화의 등급과 카테고리별로 해당되는 영화를 검색할 수 있다면 좋을 것 같다는 생각을 했다. 영화 등급 5개(PG, G, NC-17, PG-13, R)와 영화 카테고리 16개(Action, Animation, Children ...)를 체크박스를 이용해 검색가능하게 구현하였다. 만약 사용자가 첫번째 체크박스를 PG, 두번째 체크박스를 Action으로 선택한 후 Search버튼을 누르면
>SELECT f.title, f.rating, c.name
FROM film f, film_category film_c, category c
WHERE f.film_id = film_c.film_id
AND film_c.category_id = c.category_id
AND f.rating = \"{$filtered_rating}\"
AND c.name = \"{$filtered_category}\"

위의 sql문을 통해 검색한 값과 등급과 카테고리가 같은 영화를 검색해준다.

------------
3) 고객관리(고객 별 주소, 도시, 나라), 고객 이름 검색 가능 
처음 고객관리 페이지인 customer_info.php 페이지에 들어가면 sql문
> SELECT upper(concat(first_name, ' ', last_name)) 'Customer Name', a.address, city.city, coun.country
FROM customer cus, address a, city city, country coun
WHERE cus.address_id = a.address_id
AND a.city_id = city.city_id
AND city.country_id = coun.country_id
LIMIT 30

를 통해 범위 30까지의 고객 이름, 주소, 도시, 나라가 미리보기로 표시된다.
정보를 찾고자하는 고객의 first_name과 last_name을 입력한 후 Search버튼을 누르면 위 sql문의 마지막문단인
> LIMIT 30

대신
> AND cus.first_name = '{$filtered_first_name}'
    AND cus.last_name = '{$filtered_last_name}'

를 통해 원하는 고객의 정보를 따로 출력해준다. 마찬가지로 DB에 없는 값을 입력했을 경우, header를 통해 원래 있던 페이지로 자동으로 돌아간다.

이것도 역시 메인페이지로 갈 것인지, 고객 검색 페이지로 갈 것인지 선택할 수 있다.

(1), (2), (3) 세 메뉴 모두 보안을 위해 href를 통해 연결하지 않고, button을 생성해 해당 페이지로 이동 가능하게 구현하였다.

### <동작 화면 소개 영상>
테스트동영상 : https://youtu.be/j82xBoOt9Fs
