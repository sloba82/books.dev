<div ng-controller="BookCtrl">
    <div>
        <ul ng-init="getBook()">
            <li>
                [[book.photo]]
            </li>
            <li>
                [[book.title_eng]]
            </li>
            <li>
                [[book.title_srb]]
            </li>
            <li>
                [[book.discription_short]]
            </li>
            <li>
                [[book.autor]]
            </li>
            <li>
                [[book.price]]
            </li>
            <li>
                [[book.page_num]]
            </li>
            <li>
                [[book.deadline]]
            </li>
            <li>
                [[book.book_pdf]]
            </li>
            <li>
                [[book.book_cover]]
            </li>
        </ul>
        <button>{{ trans('buttons.order') }}</button>
    </div>
</div>