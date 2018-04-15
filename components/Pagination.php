<?php
/*
 * Класс Pagination 
 */
class Pagination
{
    /**
     * 
     * @var к-сть сторінок навігації
     * 
     */
    private $max = 10;
    /**
     * 
     * @var Ключ для GET, в якому пишеться назва сторінки
     * 
     */
    private $index = 'page';
    /**
     * 
     * @var поточна сторінка
     * 
     */
    private $current_page;
    /**
     * 
     * @var загальна к-сть записів
     * 
     */
    private $total;
    /**
     * 
     * @var записів на сторінку
     * 
     */
    private $limit;
    /**
     * @param type $total загальна к-сть записів
     * @param type $currentPage номер поточної сторінки
     * @param type $limit  к-сть записів на сторінку
     * @param type $index Ключ для url
     */
    public function __construct($total, $currentPage, $limit, $index)
    {
        $this->total = $total;
        $this->limit = $limit;
        $this->index = $index;
        $this->amount = $this->amount();        
        $this->setCurrentPage($currentPage);
    }

    public function get()
    {
        # Для запису посилань
        $links = null;
        # отримуєм ліміт для циклу
        $limits = $this->limits();
        
        $html = '<ul class="pagination">';
        # Генеруєм лінки
        for ($page = $limits[0]; $page <= $limits[1]; $page++) {
            # якщо це поточна сторінка, то лінки немає і клас active
            if ($page == $this->current_page) {
                $links .= '<li class="active"><a href="#">' . $page . '</a></li>';
            } else {
                # Генеруєм лінку
                $links .= $this->generateHtml($page);
            }
        }
        # якщо згенерились
        if (!is_null($links)) {
            # Якщо поточна лінка не перша
            if ($this->current_page > 1)
            # створюєм лінку "на першу"
                $links = $this->generateHtml(1, '&lt;') . $links;
            # Якщо поточна лінка не перша
            if ($this->current_page < $this->amount)
            # створюєм лінку "на оствнню"
                $links .= $this->generateHtml($this->amount, '&gt;');
        }
        $html .= $links . '</ul>';
        # вертаєм html
        return $html;
    }
    /**
     * Для генерації HTML-кода лінки
     * @param integer $page - номер сторінки
     * 
     * @return
     */
    private function generateHtml($page, $text = null)
    {
        # якщо текст лінки не указан
        if (!$text)
        #текст - цифра сторінки
            $text = $page;
        $currentURI = rtrim($_SERVER['REQUEST_URI'], '/') . '/';
        $currentURI = preg_replace('~/page-[0-9]+~', '', $currentURI);
        
        return
                '<li><a href="' . $currentURI . $this->index . $page . '">' . $text . '</a></li>';
    }
    /**
     *  Для получения, откуда стартовать
     * 
     * @return массив с началом и концом отсчёта
     */
    private function limits()
    {
        # Вычисляем ссылки слева (чтобы активная ссылка была посередине)
        $left = $this->current_page - round($this->max / 2);
        
        # Вычисляем начало отсчёта
        $start = $left > 0 ? $left : 1;
        # Если впереди есть как минимум $this->max страниц
        if ($start + $this->max <= $this->amount) {
        # Назначаем конец цикла вперёд на $this->max страниц или просто на минимум
            $end = $start > 1 ? $start + $this->max : $this->max;
        } else {
            # Конец - общее количество страниц
            $end = $this->amount;
            # Начало - минус $this->max от конца
            $start = $this->amount - $this->max > 0 ? $this->amount - $this->max : 1;
        }
        # Возвращаем
        return
                array($start, $end);
    }
    /**
     * Для установки текущей сторінки
     * 
     * @return
     */
    private function setCurrentPage($currentPage)
    {
        # Получаем номер сторінки
        $this->current_page = $currentPage;
        # Если текущая страница больше нуля
        if ($this->current_page > 0) {
            # Если текущая страница меньше общего количества страниц
            if ($this->current_page > $this->amount)
            # Устанавливаем страницу на последнюю
                $this->current_page = $this->amount;
        } else
        # Устанавливаем страницу на первую
            $this->current_page = 1;
    }
    /**
     * Для получения общего числа страниц
     * 
     * @return число страниц
     */
    private function amount()
    {
        # Делим и возвращаем
        return ceil($this->total / $this->limit);
    }
}
