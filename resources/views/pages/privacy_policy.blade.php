@extends('index')

@section('head')
    <title>{{ $page->title }}</title>
    <meta name="keywords" content="{{ $page->keywords }}">
    <meta name="description" content="{{ $page->description }}">
    @if($page->image)
        <meta property="og:image" content="{{ url($page->image) }}"/>
        <link rel="image_src" href="{{ url($page->image) }}"/>
    @else
        {!! $defaultOGImage !!}
    @endif
    <meta name="og:title" content="{{ $page->title }}">
    <meta name="og:description" content="{{ $page->description }}">
@endsection

@section('content')
    <section class="contact">
        <div class="wrapper">
            <div class="wrapper-short">
                {{ Breadcrumbs::render('single.first_page', "Политика конфиденциальности", route('privacy.policy')) }}
            </div>
            <div class="wrapper-short">
                <div class="title-box">
                    <div class="title-content">
                        <h1 class="title">Политика конфиденциаль<br>ности</h1>
                        <span>Политика конфиденциальности персональных данных</span>
                    </div>
                </div>
                <p class="footer-modal-content-p">Настоящая Политика конфиденциальности персональных данных (далее –
                    Политика
                    конфиденциальности) действует в отношении всей информации, которую сайт <strong>Системы автономной
                        канализации
                        "Septikdom.com"</strong>, (далее – Сайт) расположенный на доменном имени
                    <strong>septikdom.com</strong>
                    (а
                    также
                    его
                    субдоменах), может получить о Пользователе во время использования сайта
                    <strong>septikdom.com</strong> (а
                    также
                    его
                    субдоменов), его программ и его продуктов.</p>
                <ol class="footer-modal-content-list ordered">
                    <li class="footer-modal-content-list-item">
                        <div class="footer-modal-content-list-item-container">
                            <span class="footer-modal-content-list-item-num">1.</span>
                            <span class="footer-modal-content-list-item-text">Определение терминов</span>
                        </div>
                        <ol class="footer-modal-content-list ordered">
                            <li class="footer-modal-content-list-item lv-2">
                                <div class="footer-modal-content-list-item-container">
                                    <span class="footer-modal-content-list-item-num">1.1.</span>
                                    <span class="footer-modal-content-list-item-text">В настоящей Политике конфиденциальности используются следующие термины:</span>
                                </div>
                                <ol class="footer-modal-content-list ordered">
                                    <li class="footer-modal-content-list-item lv-3">
                                        <div class="footer-modal-content-list-item-container">
                                            <span class="footer-modal-content-list-item-num">1.1.1.</span>
                                            <span class="footer-modal-content-list-item-text">«Администрация сайта» (далее – Администрация) – уполномоченные сотрудники на управление сайтом Системы автономной канализации "Septikdom.com", действующие от имени ООО "Экосеть", которые организуют и (или) осуществляют обработку персональных данных, а также определяет цели обработки персональных данных, состав персональных данных, подлежащих обработке, действия (операции), совершаемые с персональными данными.</span>
                                        </div>
                                    </li>
                                    <li class="footer-modal-content-list-item lv-3">
                                        <div class="footer-modal-content-list-item-container">
                                            <span class="footer-modal-content-list-item-num">1.1.2.</span>
                                            <span class="footer-modal-content-list-item-text">«Персональные данные» - любая информация, относящаяся к прямо или косвенно определенному, или определяемому физическому лицу (субъекту персональных данных).</span>
                                        </div>
                                    </li>
                                    <li class="footer-modal-content-list-item lv-3">
                                        <div class="footer-modal-content-list-item-container">
                                            <span class="footer-modal-content-list-item-num">1.1.3.</span>
                                            <span class="footer-modal-content-list-item-text">«Обработка персональных данных» - любое действие (операция) или совокупность действий (операций), совершаемых с использованием средств автоматизации или без использования таких средств с персональными данными, включая сбор, запись, систематизацию, накопление, хранение, уточнение (обновление, изменение), извлечение, использование, передачу (распространение, предоставление, доступ), обезличивание, блокирование, удаление, уничтожение персональных данных.</span>
                                        </div>
                                    </li>
                                    <li class="footer-modal-content-list-item lv-3">
                                        <div class="footer-modal-content-list-item-container">
                                            <span class="footer-modal-content-list-item-num">1.1.4.</span>
                                            <span class="footer-modal-content-list-item-text">«Конфиденциальность персональных данных» - обязательное для соблюдения Оператором или иным получившим доступ к персональным данным лицом требование не допускать их распространения без согласия субъекта персональных данных или наличия иного законного основания.</span>
                                        </div>
                                    </li>
                                    <li class="footer-modal-content-list-item lv-3">
                                        <div class="footer-modal-content-list-item-container">
                                            <span class="footer-modal-content-list-item-num">1.1.5.</span>
                                            <span class="footer-modal-content-list-item-text">«Сайт Системы автономной канализации "Septikdom.com"» - это совокупность связанных между собой веб-страниц, размещенных в сети Интернет по уникальному адресу (URL): septikdom.com, а также его субдоменах.</span>
                                        </div>
                                    </li>
                                    <li class="footer-modal-content-list-item lv-3">
                                        <div class="footer-modal-content-list-item-container">
                                            <span class="footer-modal-content-list-item-num">1.1.6.</span>
                                            <span class="footer-modal-content-list-item-text">«Субдомены» - это страницы или совокупность страниц, расположенные на доменах третьего уровня, принадлежащие сайту Системы автономной канализации "Septikdom.com", а также другие временные страницы, внизу который указана контактная информация Администрации.</span>
                                        </div>
                                    </li>
                                    <li class="footer-modal-content-list-item lv-3">
                                        <div class="footer-modal-content-list-item-container">
                                            <span class="footer-modal-content-list-item-num">1.1.7.</span>
                                            <span class="footer-modal-content-list-item-text">«Пользователь сайта Системы автономной канализации "Septikdom.com" » (далее Пользователь) – лицо, имеющее доступ к сайту Системы автономной канализации "Septikdom.com", посредством сети Интернет и использующее информацию, материалы и продукты сайта Системы автономной канализации "Septikdom.com".</span>
                                        </div>
                                    </li>
                                    <li class="footer-modal-content-list-item lv-3">
                                        <div class="footer-modal-content-list-item-container">
                                            <span class="footer-modal-content-list-item-num">1.1.8.</span>
                                            <span class="footer-modal-content-list-item-text">«Cookies» — небольшой фрагмент данных, отправленный веб-сервером и хранимый на компьютере пользователя, который веб-клиент или веб-браузер каждый раз пересылает веб-серверу в HTTP-запросе при попытке открыть страницу соответствующего сайта.</span>
                                        </div>
                                    </li>
                                    <li class="footer-modal-content-list-item lv-3">
                                        <div class="footer-modal-content-list-item-container">
                                            <span class="footer-modal-content-list-item-num">1.1.9.</span>
                                            <span class="footer-modal-content-list-item-text">«IP-адрес» — уникальный сетевой адрес узла в компьютерной сети, через который Пользователь получает доступ на Сайт.</span>
                                        </div>
                                    </li>
                                    <li class="footer-modal-content-list-item lv-3">
                                        <div class="footer-modal-content-list-item-container">
                                            <span class="footer-modal-content-list-item-num">1.1.10.</span>
                                            <span class="footer-modal-content-list-item-text">«Товар» - продукт, который Пользователь заказывает на сайте и оплачивает через платёжные системы.</span>
                                        </div>
                                    </li>
                                </ol>
                            </li>
                        </ol>
                    </li>
                </ol>
                <ol class="footer-modal-content-list ordered">
                    <li class="footer-modal-content-list-item">
                        <div class="footer-modal-content-list-item-container">
                            <span class="footer-modal-content-list-item-num">2.</span>
                            <span class="footer-modal-content-list-item-text">Общие положения</span>
                        </div>
                        <ol class="footer-modal-content-list ordered">
                            <li class="footer-modal-content-list-item lv-2">
                                <div class="footer-modal-content-list-item-container">
                                    <span class="footer-modal-content-list-item-num">2.1.</span>
                                    <span class="footer-modal-content-list-item-text">Использование сайта Системы автономной канализации "Septikdom.com" Пользователем означает согласие с настоящей Политикой конфиденциальности и условиями обработки персональных данных Пользователя.</span>
                                </div>
                            </li>
                            <li class="footer-modal-content-list-item lv-2">
                                <div class="footer-modal-content-list-item-container">
                                    <span class="footer-modal-content-list-item-num">2.2.</span>
                                    <span class="footer-modal-content-list-item-text">В случае несогласия с условиями Политики конфиденциальности Пользователь должен прекратить использование сайта Системы автономной канализации "Septikdom.com".</span>
                                </div>
                            </li>
                            <li class="footer-modal-content-list-item lv-2">
                                <div class="footer-modal-content-list-item-container">
                                    <span class="footer-modal-content-list-item-num">2.3.</span>
                                    <span class="footer-modal-content-list-item-text">Настоящая Политика конфиденциальности применяется к сайту Системы автономной канализации "Septikdom.com". Сайт не контролирует и не несет ответственность за сайты третьих лиц, на которые Пользователь может перейти по ссылкам, доступным на сайте Системы автономной канализации "Septikdom.com".</span>
                                </div>
                            </li>
                            <li class="footer-modal-content-list-item lv-2">
                                <div class="footer-modal-content-list-item-container">
                                    <span class="footer-modal-content-list-item-num">2.4.</span>
                                    <span class="footer-modal-content-list-item-text">Администрация не проверяет достоверность персональных данных, предоставляемых Пользователем.</span>
                                </div>
                            </li>
                        </ol>
                    </li>
                    <li class="footer-modal-content-list-item">
                        <div class="footer-modal-content-list-item-container">
                            <span class="footer-modal-content-list-item-num">3.</span>
                            <span class="footer-modal-content-list-item-text">Предмет политики конфиденциальности</span>
                        </div>
                        <ol class="footer-modal-content-list ordered">
                            <li class="footer-modal-content-list-item lv-2">
                                <div class="footer-modal-content-list-item-container">
                                    <span class="footer-modal-content-list-item-num">3.1.</span>
                                    <span class="footer-modal-content-list-item-text">Настоящая Политика конфиденциальности устанавливает обязательства Администрации по неразглашению и обеспечению режима защиты конфиденциальности персональных данных, которые Пользователь предоставляет по запросу Администрации при регистрации на сайте Системы автономной канализации "Septikdom.com", при подписке на информационную e-mail рассылку или при оформлении заказа.</span>
                                </div>
                            </li>
                            <li class="footer-modal-content-list-item lv-2">
                                <div class="footer-modal-content-list-item-container">
                                    <span class="footer-modal-content-list-item-num">3.2.</span>
                                    <span class="footer-modal-content-list-item-text">Персональные данные, разрешённые к обработке в рамках настоящей Политики конфиденциальности, предоставляются Пользователем путём заполнения форм на сайте Системы автономной канализации "Septikdom.com" и включают в себя следующую информацию:</span>
                                </div>
                                <ol class="footer-modal-content-list ordered">
                                    <li class="footer-modal-content-list-item lv-3">
                                        <div class="footer-modal-content-list-item-container">
                                            <span class="footer-modal-content-list-item-num">3.2.1.</span>
                                            <span class="footer-modal-content-list-item-text">фамилию, имя, отчество Пользователя;</span>
                                        </div>
                                    </li>
                                    <li class="footer-modal-content-list-item lv-3">
                                        <div class="footer-modal-content-list-item-container">
                                            <span class="footer-modal-content-list-item-num">3.2.2</span>
                                            <span class="footer-modal-content-list-item-text">контактный телефон Пользователя;</span>
                                        </div>
                                    </li>
                                    <li class="footer-modal-content-list-item lv-3">
                                        <div class="footer-modal-content-list-item-container">
                                            <span class="footer-modal-content-list-item-num">3.2.3</span>
                                            <span class="footer-modal-content-list-item-text">адрес электронной почты (e-mail)</span>
                                        </div>
                                    </li>
                                    <li class="footer-modal-content-list-item lv-3">
                                        <div class="footer-modal-content-list-item-container">
                                            <span class="footer-modal-content-list-item-num">3.2.4.</span>
                                            <span class="footer-modal-content-list-item-text">место жительство Пользователя (при необходимости)</span>
                                        </div>
                                    </li>
                                    <li class="footer-modal-content-list-item lv-3">
                                        <div class="footer-modal-content-list-item-container">
                                            <span class="footer-modal-content-list-item-num">3.2.5.</span>
                                            <span class="footer-modal-content-list-item-text">адрес доставки Товара (при необходимости)</span>
                                        </div>
                                    </li>
                                    <li class="footer-modal-content-list-item lv-3">
                                        <div class="footer-modal-content-list-item-container">
                                            <span class="footer-modal-content-list-item-num">3.2.6.</span>
                                            <span class="footer-modal-content-list-item-text">фотографию (при необходимости).</span>
                                        </div>
                                    </li>
                                </ol>
                            </li>
                            <li class="footer-modal-content-list-item lv-2">
                                <div class="footer-modal-content-list-item-container">
                                    <span class="footer-modal-content-list-item-num">3.3.</span>
                                    <span class="footer-modal-content-list-item-text">Сайт защищает Данные, которые автоматически передаются при посещении страниц:
										<br>- IP адрес;
										<br>- информация из cookies;
										<br>- информация о браузере
										<br>- время доступа;
										<br>- реферер (адрес предыдущей страницы).</span>
                                </div>
                                <ol class="footer-modal-content-list ordered">
                                    <li class="footer-modal-content-list-item lv-3">
                                        <div class="footer-modal-content-list-item-container">
                                            <span class="footer-modal-content-list-item-num">3.3.1.</span>
                                            <span class="footer-modal-content-list-item-text">Отключение cookies может повлечь невозможность доступа к частям сайта , требующим авторизации.</span>
                                        </div>
                                    </li>
                                    <li class="footer-modal-content-list-item lv-3">
                                        <div class="footer-modal-content-list-item-container">
                                            <span class="footer-modal-content-list-item-num">3.3.2</span>
                                            <span class="footer-modal-content-list-item-text">Сайт осуществляет сбор статистики об IP-адресах своих посетителей. Данная информация используется с целью предотвращения, выявления и решения технических проблем.</span>
                                        </div>
                                    </li>
                                </ol>
                            </li>
                            <li class="footer-modal-content-list-item lv-2">
                                <div class="footer-modal-content-list-item-container">
                                    <span class="footer-modal-content-list-item-num">3.4.</span>
                                    <span class="footer-modal-content-list-item-text">Любая иная персональная информация неоговоренная выше (история посещения, используемые браузеры, операционные системы и т.д.) подлежит надежному хранению и нераспространению, за исключением случаев, предусмотренных в п.п. 5.2. и 5.3. настоящей Политики конфиденциальности.</span>
                                </div>
                            </li>
                        </ol>
                    </li>
                </ol>
                <ol class="footer-modal-content-list ordered">
                    <li class="footer-modal-content-list-item">
                        <div class="footer-modal-content-list-item-container">
                            <span class="footer-modal-content-list-item-num">4.</span>
                            <span class="footer-modal-content-list-item-text">Цели сбора персональной информации пользователя</span>
                        </div>
                        <ol class="footer-modal-content-list ordered">
                            <li class="footer-modal-content-list-item lv-2">
                                <div class="footer-modal-content-list-item-container">
                                    <span class="footer-modal-content-list-item-num">4.1.</span>
                                    <span class="footer-modal-content-list-item-text">Персональные данные Пользователя Администрация может использовать в целях:</span>
                                </div>
                                <ol class="footer-modal-content-list ordered">
                                    <li class="footer-modal-content-list-item lv-3">
                                        <div class="footer-modal-content-list-item-container">
                                            <span class="footer-modal-content-list-item-num">4.1.1.</span>
                                            <span class="footer-modal-content-list-item-text">Идентификации Пользователя, зарегистрированного на сайте Системы автономной канализации "Septikdom.com" для его дальнейшей авторизации, оформления заказа и других действий.</span>
                                        </div>
                                    </li>
                                    <li class="footer-modal-content-list-item lv-3">
                                        <div class="footer-modal-content-list-item-container">
                                            <span class="footer-modal-content-list-item-num">4.1.2</span>
                                            <span class="footer-modal-content-list-item-text">Предоставления Пользователю доступа к персонализированным данным сайта Системы автономной канализации "Septikdom.com".</span>
                                        </div>
                                    </li>
                                    <li class="footer-modal-content-list-item lv-3">
                                        <div class="footer-modal-content-list-item-container">
                                            <span class="footer-modal-content-list-item-num">4.1.3</span>
                                            <span class="footer-modal-content-list-item-text">Установления с Пользователем обратной связи, включая направление уведомлений, запросов, касающихся использования сайта Системы автономной канализации "Septikdom.com", оказания услуг и обработки запросов и заявок от Пользователя.</span>
                                        </div>
                                    </li>
                                    <li class="footer-modal-content-list-item lv-3">
                                        <div class="footer-modal-content-list-item-container">
                                            <span class="footer-modal-content-list-item-num">4.1.4.</span>
                                            <span class="footer-modal-content-list-item-text">Определения места нахождения Пользователя для обеспечения безопасности, предотвращения мошенничества.</span>
                                        </div>
                                    </li>
                                    <li class="footer-modal-content-list-item lv-3">
                                        <div class="footer-modal-content-list-item-container">
                                            <span class="footer-modal-content-list-item-num">4.1.5.</span>
                                            <span class="footer-modal-content-list-item-text">Подтверждения достоверности и полноты персональных данных, предоставленных Пользователем.</span>
                                        </div>
                                    </li>
                                    <li class="footer-modal-content-list-item lv-3">
                                        <div class="footer-modal-content-list-item-container">
                                            <span class="footer-modal-content-list-item-num">4.1.6.</span>
                                            <span class="footer-modal-content-list-item-text">Создания учетной записи для использования частей сайта Системы автономной канализации "Septikdom.com", если Пользователь дал согласие на создание учетной записи.</span>
                                        </div>
                                    </li>
                                    <li class="footer-modal-content-list-item lv-3">
                                        <div class="footer-modal-content-list-item-container">
                                            <span class="footer-modal-content-list-item-num">4.1.7.</span>
                                            <span class="footer-modal-content-list-item-text">Уведомления Пользователя по электронной почте.</span>
                                        </div>
                                    </li>
                                    <li class="footer-modal-content-list-item lv-3">
                                        <div class="footer-modal-content-list-item-container">
                                            <span class="footer-modal-content-list-item-num">4.1.8.</span>
                                            <span class="footer-modal-content-list-item-text">Предоставления Пользователю эффективной технической поддержки при возникновении проблем, связанных с использованием сайта Системы автономной канализации "Septikdom.com".</span>
                                        </div>
                                    </li>
                                    <li class="footer-modal-content-list-item lv-3">
                                        <div class="footer-modal-content-list-item-container">
                                            <span class="footer-modal-content-list-item-num">4.1.9.</span>
                                            <span class="footer-modal-content-list-item-text">Предоставления Пользователю с его согласия специальных предложений, информации о ценах, новостной рассылки и иных сведений от имени сайта Системы автономной канализации "Septikdom.com".</span>
                                        </div>
                                    </li>
                                    <li class="footer-modal-content-list-item lv-3">
                                        <div class="footer-modal-content-list-item-container">
                                            <span class="footer-modal-content-list-item-num">4.1.10.</span>
                                            <span class="footer-modal-content-list-item-text">Осуществления рекламной деятельности с согласия Пользователя.</span>
                                        </div>
                                    </li>
                                </ol>
                            </li>
                        </ol>
                    </li>
                </ol>
                <ol class="footer-modal-content-list ordered">
                    <li class="footer-modal-content-list-item">
                        <div class="footer-modal-content-list-item-container">
                            <span class="footer-modal-content-list-item-num">5.</span>
                            <span class="footer-modal-content-list-item-text">Способы и сроки обработки персональной информации</span>
                        </div>
                        <ol class="footer-modal-content-list ordered">
                            <li class="footer-modal-content-list-item lv-2">
                                <div class="footer-modal-content-list-item-container">
                                    <span class="footer-modal-content-list-item-num">5.1.</span>
                                    <span class="footer-modal-content-list-item-text">Обработка персональных данных Пользователя осуществляется без ограничения срока, любым законным способом, в том числе в информационных системах персональных данных с использованием средств автоматизации или без использования таких средств.</span>
                                </div>
                            </li>
                            <li class="footer-modal-content-list-item lv-2">
                                <div class="footer-modal-content-list-item-container">
                                    <span class="footer-modal-content-list-item-num">5.2.</span>
                                    <span class="footer-modal-content-list-item-text">Пользователь соглашается с тем, что Администрация вправе передавать персональные данные третьим лицам, в частности, курьерским службам, организациями почтовой связи (в том числе электронной), операторам электросвязи, исключительно в целях выполнения заказа Пользователя, оформленного на сайте Системы автономной канализации "Septikdom.com", включая доставку Товара, документации или e-mail сообщений.</span>
                                </div>
                            </li>
                            <li class="footer-modal-content-list-item lv-2">
                                <div class="footer-modal-content-list-item-container">
                                    <span class="footer-modal-content-list-item-num">5.3.</span>
                                    <span class="footer-modal-content-list-item-text">Персональные данные Пользователя могут быть переданы уполномоченным органам государственной власти Российской Федерации только по основаниям и в порядке, установленным законодательством Российской Федерации.</span>
                                </div>
                            </li>
                            <li class="footer-modal-content-list-item lv-2">
                                <div class="footer-modal-content-list-item-container">
                                    <span class="footer-modal-content-list-item-num">5.4.</span>
                                    <span class="footer-modal-content-list-item-text">При утрате или разглашении персональных данных Администрация вправе не информировать Пользователя об утрате или разглашении персональных данных.</span>
                                </div>
                            </li>
                            <li class="footer-modal-content-list-item lv-2">
                                <div class="footer-modal-content-list-item-container">
                                    <span class="footer-modal-content-list-item-num">5.5.</span>
                                    <span class="footer-modal-content-list-item-text">Администрация принимает необходимые организационные и технические меры для защиты персональной информации Пользователя от неправомерного или случайного доступа, уничтожения, изменения, блокирования, копирования, распространения, а также от иных неправомерных действий третьих лиц.</span>
                                </div>
                            </li>
                            <li class="footer-modal-content-list-item lv-2">
                                <div class="footer-modal-content-list-item-container">
                                    <span class="footer-modal-content-list-item-num">5.6.</span>
                                    <span class="footer-modal-content-list-item-text">Администрация совместно с Пользователем принимает все необходимые меры по предотвращению убытков или иных отрицательных последствий, вызванных утратой или разглашением персональных данных Пользователя.</span>
                                </div>
                            </li>
                        </ol>
                    </li>
                </ol>
                <ol class="footer-modal-content-list ordered">
                    <li class="footer-modal-content-list-item">
                        <div class="footer-modal-content-list-item-container">
                            <span class="footer-modal-content-list-item-num">6.</span>
                            <span class="footer-modal-content-list-item-text">Права и обязанности сторон</span>
                        </div>
                        <ol class="footer-modal-content-list ordered">
                            <li class="footer-modal-content-list-item lv-2">
                                <div class="footer-modal-content-list-item-container">
                                    <span class="footer-modal-content-list-item-num">6.1.</span>
                                    <span class="footer-modal-content-list-item-text">Пользователь вправе:</span>
                                </div>
                                <ol class="footer-modal-content-list ordered">
                                    <li class="footer-modal-content-list-item lv-3">
                                        <div class="footer-modal-content-list-item-container">
                                            <span class="footer-modal-content-list-item-num">6.1.1.</span>
                                            <span class="footer-modal-content-list-item-text">Принимать свободное решение о предоставлении своих персональных данных, необходимых для использования сайта Системы автономной канализации "Septikdom.com", и давать согласие на их обработку.</span>
                                        </div>
                                    </li>
                                    <li class="footer-modal-content-list-item lv-3">
                                        <div class="footer-modal-content-list-item-container">
                                            <span class="footer-modal-content-list-item-num">6.1.2</span>
                                            <span class="footer-modal-content-list-item-text">Обновить, дополнить предоставленную информацию о персональных данных в случае изменения данной информации.</span>
                                        </div>
                                    </li>
                                    <li class="footer-modal-content-list-item lv-3">
                                        <div class="footer-modal-content-list-item-container">
                                            <span class="footer-modal-content-list-item-num">6.1.3</span>
                                            <span class="footer-modal-content-list-item-text">Пользователь имеет право на получение у Администрации информации, касающейся обработки его персональных данных, если такое право не ограничено в соответствии с федеральными законами. Пользователь вправе требовать от Администрации уточнения его персональных данных, их блокирования или уничтожения в случае, если персональные данные являются неполными, устаревшими, неточными, незаконно полученными или не являются необходимыми для заявленной цели обработки, а также принимать предусмотренные законом меры по защите своих прав.</span>
                                        </div>
                                    </li>
                                </ol>
                            </li>
                            <li class="footer-modal-content-list-item lv-2">
                                <div class="footer-modal-content-list-item-container">
                                    <span class="footer-modal-content-list-item-num">6.2.</span>
                                    <span class="footer-modal-content-list-item-text">Администрация обязана:</span>
                                </div>
                                <ol class="footer-modal-content-list ordered">
                                    <li class="footer-modal-content-list-item lv-3">
                                        <div class="footer-modal-content-list-item-container">
                                            <span class="footer-modal-content-list-item-num">6.2.1.</span>
                                            <span class="footer-modal-content-list-item-text">Использовать полученную информацию исключительно для целей, указанных в п. 4 настоящей Политики конфиденциальности.</span>
                                        </div>
                                    </li>
                                    <li class="footer-modal-content-list-item lv-3">
                                        <div class="footer-modal-content-list-item-container">
                                            <span class="footer-modal-content-list-item-num">6.2.2</span>
                                            <span class="footer-modal-content-list-item-text">Обеспечить хранение конфиденциальной информации в тайне, не разглашать без предварительного письменного разрешения Пользователя, а также не осуществлять продажу, обмен, опубликование, либо разглашение иными возможными способами переданных персональных данных Пользователя, за исключением п.п. 5.2 и 5.3. настоящей Политики Конфиденциальности.</span>
                                        </div>
                                    </li>
                                    <li class="footer-modal-content-list-item lv-3">
                                        <div class="footer-modal-content-list-item-container">
                                            <span class="footer-modal-content-list-item-num">6.2.3</span>
                                            <span class="footer-modal-content-list-item-text">Принимать меры предосторожности для защиты конфиденциальности персональных данных Пользователя согласно порядку, обычно используемого для защиты такого рода информации в существующем деловом обороте.</span>
                                        </div>
                                    </li>
                                    <li class="footer-modal-content-list-item lv-3">
                                        <div class="footer-modal-content-list-item-container">
                                            <span class="footer-modal-content-list-item-num">6.2.4</span>
                                            <span class="footer-modal-content-list-item-text">Осуществить блокирование персональных данных, относящихся к соответствующему Пользователю, с момента обращения или запроса Пользователя, или его законного представителя либо уполномоченного органа по защите прав субъектов персональных данных на период проверки, в случае выявления недостоверных персональных данных или неправомерных действий.</span>
                                        </div>
                                    </li>
                                </ol>
                            </li>
                        </ol>
                    </li>
                </ol>
                <ol class="footer-modal-content-list ordered">
                    <li class="footer-modal-content-list-item">
                        <div class="footer-modal-content-list-item-container">
                            <span class="footer-modal-content-list-item-num">7.</span>
                            <span class="footer-modal-content-list-item-text">Ответственность сторон</span>
                        </div>
                        <ol class="footer-modal-content-list ordered">
                            <li class="footer-modal-content-list-item lv-2">
                                <div class="footer-modal-content-list-item-container">
                                    <span class="footer-modal-content-list-item-num">7.1.</span>
                                    <span class="footer-modal-content-list-item-text">Администрация, не исполнившая свои обязательства, несёт ответственность за убытки, понесённые Пользователем в связи с неправомерным использованием персональных данных, в соответствии с законодательством Российской Федерации, за исключением случаев, предусмотренных п.п. 5.2., 5.3. и 7.2. настоящей Политики Конфиденциальности.</span>
                                </div>
                            </li>
                            <li class="footer-modal-content-list-item lv-2">
                                <div class="footer-modal-content-list-item-container">
                                    <span class="footer-modal-content-list-item-num">7.2.</span>
                                    <span class="footer-modal-content-list-item-text">В случае утраты или разглашения Конфиденциальной информации Администрация не несёт ответственность, если данная конфиденциальная информация:</span>
                                </div>
                                <ol class="footer-modal-content-list ordered">
                                    <li class="footer-modal-content-list-item lv-3">
                                        <div class="footer-modal-content-list-item-container">
                                            <span class="footer-modal-content-list-item-num">7.2.1.</span>
                                            <span class="footer-modal-content-list-item-text">Стала публичным достоянием до её утраты или разглашения.</span>
                                        </div>
                                    </li>
                                    <li class="footer-modal-content-list-item lv-3">
                                        <div class="footer-modal-content-list-item-container">
                                            <span class="footer-modal-content-list-item-num">7.2.2</span>
                                            <span class="footer-modal-content-list-item-text">Была получена от третьей стороны до момента её получения Администрацией Ресурса.</span>
                                        </div>
                                    </li>
                                    <li class="footer-modal-content-list-item lv-3">
                                        <div class="footer-modal-content-list-item-container">
                                            <span class="footer-modal-content-list-item-num">7.2.3</span>
                                            <span class="footer-modal-content-list-item-text">Была разглашена с согласия Пользователя.</span>
                                        </div>
                                    </li>
                                </ol>
                            </li>
                            <li class="footer-modal-content-list-item lv-2">
                                <div class="footer-modal-content-list-item-container">
                                    <span class="footer-modal-content-list-item-num">7.3.</span>
                                    <span class="footer-modal-content-list-item-text">Пользователь несет полную ответственность за соблюдение требований законодательства РФ, в том числе законов о рекламе, о защите авторских и смежных прав, об охране товарных знаков и знаков обслуживания, но не ограничиваясь перечисленным, включая полную ответственность за содержание и форму материалов.</span>
                                </div>
                            </li>
                            <li class="footer-modal-content-list-item lv-2">
                                <div class="footer-modal-content-list-item-container">
                                    <span class="footer-modal-content-list-item-num">7.4.</span>
                                    <span class="footer-modal-content-list-item-text">Пользователь признает, что ответственность за любую информацию (в том числе, но не ограничиваясь: файлы с данными, тексты и т. д.), к которой он может иметь доступ как к части сайта Системы автономной канализации "Septikdom.com", несет лицо, предоставившее такую информацию.</span>
                                </div>
                            </li>
                            <li class="footer-modal-content-list-item lv-2">
                                <div class="footer-modal-content-list-item-container">
                                    <span class="footer-modal-content-list-item-num">7.5.</span>
                                    <span class="footer-modal-content-list-item-text">Пользователь соглашается, что информация, предоставленная ему как часть сайта Системы автономной канализации "Septikdom.com", может являться объектом интеллектуальной собственности, права на который защищены и принадлежат другим Пользователям, партнерам или рекламодателям, которые размещают такую информацию на сайте Системы автономной канализации "Septikdom.com".</span>
                                </div>
                            </li>
                            <li class="footer-modal-content-list-item lv-2">
                                <div class="footer-modal-content-list-item-container">
                                    <span class="footer-modal-content-list-item-num">7.6.</span>
                                    <span class="footer-modal-content-list-item-text">Пользователь не вправе вносить изменения, передавать в аренду, передавать на условиях займа, продавать, распространять или создавать производные работы на основе такого Содержания (полностью или в части), за исключением случаев, когда такие действия были письменно прямо разрешены собственниками такого Содержания в соответствии с условиями отдельного соглашения.</span>
                                </div>
                            </li>
                            <li class="footer-modal-content-list-item lv-2">
                                <div class="footer-modal-content-list-item-container">
                                    <span class="footer-modal-content-list-item-num">7.7.</span>
                                    <span class="footer-modal-content-list-item-text">В отношение текстовых материалов (статей, публикаций, находящихся в свободном публичном доступе на сайте Системы автономной канализации "Septikdom.com") допускается их распространение при условии, что будет дана ссылка на Сайт.</span>
                                </div>
                            </li>
                            <li class="footer-modal-content-list-item lv-2">
                                <div class="footer-modal-content-list-item-container">
                                    <span class="footer-modal-content-list-item-num">7.8.</span>
                                    <span class="footer-modal-content-list-item-text">Администрация не несет ответственности перед Пользователем за любой убыток или ущерб, понесенный Пользователем в результате удаления, сбоя или невозможности сохранения какого-либо Содержания и иных коммуникационных данных, содержащихся на сайте Системы автономной канализации "Septikdom.com" или передаваемых через него.</span>
                                </div>
                            </li>
                            <li class="footer-modal-content-list-item lv-2">
                                <div class="footer-modal-content-list-item-container">
                                    <span class="footer-modal-content-list-item-num">7.9.</span>
                                    <span class="footer-modal-content-list-item-text">Администрация не несет ответственности за любые прямые или косвенные убытки, произошедшие из-за: использования либо невозможности использования сайта, либо отдельных сервисов; несанкционированного доступа к коммуникациям Пользователя; заявления или поведение любого третьего лица на сайте.</span>
                                </div>
                            </li>
                            <li class="footer-modal-content-list-item lv-2">
                                <div class="footer-modal-content-list-item-container">
                                    <span class="footer-modal-content-list-item-num">7.10.</span>
                                    <span class="footer-modal-content-list-item-text">Администрация не несет ответственность за какую-либо информацию, размещенную пользователем на сайте Системы автономной канализации "Septikdom.com", включая, но не ограничиваясь: информацию, защищенную авторским правом, без прямого согласия владельца авторского права.</span>
                                </div>
                            </li>
                        </ol>
                    </li>
                </ol>
                <ol class="footer-modal-content-list ordered">
                    <li class="footer-modal-content-list-item">
                        <div class="footer-modal-content-list-item-container">
                            <span class="footer-modal-content-list-item-num">8.</span>
                            <span class="footer-modal-content-list-item-text">Разрешение споров</span>
                        </div>
                        <ol class="footer-modal-content-list ordered">
                            <li class="footer-modal-content-list-item lv-2">
                                <div class="footer-modal-content-list-item-container">
                                    <span class="footer-modal-content-list-item-num">8.1.</span>
                                    <span class="footer-modal-content-list-item-text">До обращения в суд с иском по спорам, возникающим из отношений между Пользователем и Администрацией, обязательным является предъявление претензии (письменного предложения или предложения в электронном виде о добровольном урегулировании спора).</span>
                                </div>
                            </li>
                            <li class="footer-modal-content-list-item lv-2">
                                <div class="footer-modal-content-list-item-container">
                                    <span class="footer-modal-content-list-item-num">8.2.</span>
                                    <span class="footer-modal-content-list-item-text">Получатель претензии в течение 30 календарных дней со дня получения претензии, письменно или в электронном виде уведомляет заявителя претензии о результатах рассмотрения претензии.</span>
                                </div>
                            </li>
                            <li class="footer-modal-content-list-item lv-2">
                                <div class="footer-modal-content-list-item-container">
                                    <span class="footer-modal-content-list-item-num">8.3.</span>
                                    <span class="footer-modal-content-list-item-text">При не достижении соглашения спор будет передан на рассмотрение Арбитражного суда г. Санкт-Петербуг.</span>
                                </div>
                            </li>
                            <li class="footer-modal-content-list-item lv-2">
                                <div class="footer-modal-content-list-item-container">
                                    <span class="footer-modal-content-list-item-num">8.4.</span>
                                    <span class="footer-modal-content-list-item-text">К настоящей Политике конфиденциальности и отношениям между Пользователем и Администрацией применяется действующее законодательство Российской Федерации.</span>
                                </div>
                            </li>
                        </ol>
                    </li>
                </ol>
                <ol class="footer-modal-content-list ordered">
                    <li class="footer-modal-content-list-item">
                        <div class="footer-modal-content-list-item-container">
                            <span class="footer-modal-content-list-item-num">9.</span>
                            <span class="footer-modal-content-list-item-text">Дополнительные условия</span>
                        </div>
                        <ol class="footer-modal-content-list ordered">
                            <li class="footer-modal-content-list-item lv-2">
                                <div class="footer-modal-content-list-item-container">
                                    <span class="footer-modal-content-list-item-num">9.1.</span>
                                    <span class="footer-modal-content-list-item-text">Администрация вправе вносить изменения в настоящую Политику конфиденциальности без согласия Пользователя.</span>
                                </div>
                            </li>
                            <li class="footer-modal-content-list-item lv-2">
                                <div class="footer-modal-content-list-item-container">
                                    <span class="footer-modal-content-list-item-num">9.2.</span>
                                    <span class="footer-modal-content-list-item-text">Новая Политика конфиденциальности вступает в силу с момента ее размещения на сайте Системы автономной канализации "Septikdom.com", если иное не предусмотрено новой редакцией Политики конфиденциальности.</span>
                                </div>
                            </li>
                            <li class="footer-modal-content-list-item lv-2">
                                <div class="footer-modal-content-list-item-container">
                                    <span class="footer-modal-content-list-item-num">9.3.</span>
                                    <span class="footer-modal-content-list-item-text">Все предложения или вопросы касательно настоящей Политики конфиденциальности следует сообщать по адресу:
										<br><a class="footer-modal-content-list-item-link"
                                               href="mailto:info@septikdom.com">info@septikdom.com</a></span>
                                </div>
                            </li>
                        </ol>
                    </li>
                </ol>
                <p class="footer-modal-content-p">Обновлено: 31 Мая 2018 года</p>
                <p class="footer-modal-content-p">г. Санкт-Петербуг, ООО, Экосеть, ОГРН 1177847061732</p>
            </div>
        </div>
    </section>
@endsection