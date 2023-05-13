// const Pagination = class {
//
//     constructor(itemListData, currentPage, rows , itemsTableElement , paginationElement) {
//         this.items = itemListData,
//             this.currentPage = 1,
//             this.rows = 5,
//             this.displayItemList(itemListData, itemsTableElement, 5, 1)
//         this.setupPagination(itemListData, paginationElement, 5)
//     }
//
//     displayItemList(items, htmlOutput, rowsPerPage, page) {
//         htmlOutput.innerHTML = ''
//
//         let startIndex = rowsPerPage * page
//         let endIndex = startIndex + rowsPerPage
//         let paginatedItems = items.slice(startIndex, endIndex)
//
//         paginatedItems.forEach((item) => {
//             let trTag = document.createElement('tr');
//
//             let mosqueNameTdTag = document.createElement('td');
//             mosqueNameTdTag.innerText = item.mosque.mosque_name
//             trTag.appendChild(mosqueNameTdTag)
//
//             let firstnameTdTag = document.createElement('td');
//             firstnameTdTag.innerText = item.first_name + ' ' + item.last_name
//             trTag.appendChild(firstnameTdTag)
//
//             let nationalIDTdTag = document.createElement('td');
//             nationalIDTdTag.innerText = item.national_id
//             trTag.appendChild(nationalIDTdTag)
//
//             let banknameTdTag = document.createElement('td');
//             banknameTdTag.innerText = item.bank_name
//             trTag.appendChild(banknameTdTag)
//
//             let bankBranchTdTag = document.createElement('td');
//             bankBranchTdTag.innerText = item.bank_branch
//             trTag.appendChild(bankBranchTdTag)
//
//             let accountNumberTdTag = document.createElement('td');
//             accountNumberTdTag.innerText = item.account_number
//             trTag.appendChild(accountNumberTdTag)
//
//             let assignedRoleTdTag = document.createElement('td');
//             assignedRoleTdTag.innerText = item.assigned_role
//             trTag.appendChild(assignedRoleTdTag)
//
//             let assigningDateTdTag = document.createElement('td');
//             assigningDateTdTag.innerText = item.assigning_date
//             trTag.appendChild(assigningDateTdTag)
//
//             let assignedTypeTdTag = document.createElement('td');
//             assignedTypeTdTag.innerText = item.assigned_type
//             trTag.appendChild(assignedTypeTdTag)
//
//             if (item.assigned_status === 'مستمر') {
//                 let divTag = document.createElement('div')
//                 divTag.className = 'success-badge mt-2'
//                 let assignedTypeTdTag = document.createElement('td');
//                 divTag.innerText = item.assigned_status
//                 assignedTypeTdTag.appendChild(divTag)
//                 trTag.appendChild(assignedTypeTdTag)
//             }
//             if (item.assigned_status === 'لفت نظر') {
//                 let divTag = document.createElement('div')
//                 divTag.className = 'danger-badge mt-2'
//                 let assignedTypeTdTag = document.createElement('td');
//                 divTag.innerText = item.assigned_status
//                 assignedTypeTdTag.appendChild(divTag)
//                 trTag.appendChild(assignedTypeTdTag)
//             }
//             if (item.assigned_status === 'إنذار') {
//                 let divTag = document.createElement('div')
//                 divTag.className = 'danger-badge mt-2'
//                 let assignedTypeTdTag = document.createElement('td');
//                 divTag.innerText = item.assigned_status
//                 assignedTypeTdTag.appendChild(divTag)
//                 trTag.appendChild(assignedTypeTdTag)
//             }
//
//             htmlOutput.appendChild(trTag)
//         })
//     };
//
//
//     paginationButton(page, items) {
//         let button = document.createElement('button')
//         button.className = 'btn btn-md btn-dark ml-2 mt-2'
//         button.innerText = page
//         if (this.currentPage === page) {
//             button.classList.add('active')
//         }
//
//         button.addEventListener('click', () => {
//             this.currentPage = page
//             this.displayItemList(items, itemsTableElement, this.rows, this.currentPage)
//
//             let currentButton = document.querySelector('.pagenumbers button.active')
//             currentButton.classList.remove('active')
//
//
//             button.classList.add('active')
//         })
//
//         return button
//     };
//
//
//     setupPagination(items, htmlOutput, rowsPerPage) {
//         htmlOutput.innerHTML = ''
//         let pageCount = Math.ceil(items.length / rowsPerPage)
//         console.log(pageCount)
//         for (let pageCounter = 1; pageCounter < pageCount + 1; pageCounter++) {
//             htmlOutput.appendChild(this.paginationButton(pageCounter, items));
//         }
//     };
//
//
// }

// const itemsTableElement = document.querySelector('#list tbody');
// const paginationElement = document.getElementById('pagination');



//getPagination('.table-class');
//getPagination('table');

/*					PAGINATION
- on change max rows select options fade out all rows gt option value mx = 5
- append pagination list as per numbers of rows / max rows option (20row/5= 4pages )
- each pagination li on click -> fade out all tr gt max rows * li num and (5*pagenum 2 = 10 rows)
- fade out all tr lt max rows * li num - max rows ((5*pagenum 2 = 10) - 5)
- fade in all tr between (maxRows*PageNum) and (maxRows*pageNum)- MaxRows
*/




// Add the last page button
if (showLastPageButton) {
    attachButton({
        container: navigationButtons,
        classes: [settings.classNameButton, settings.classNameButtonLast],
        data: {key: settings.dataNamePageNumber, value: settings.buttonOptionLast},
        text: onButtonTextRender.call(this, 'اﻷخيرة', settings.onRenderDescLastPage),
        title: onButtonTitleRender.call(this, 'الصفحة اﻻخيرة', settings.onRenderDescLastPage),
    });
}
// Add the next page button
if (showNextPageButton) {
    attachButton({
        container: navigationButtons,
        classes: [settings.classNameButton, settings.classNameButtonNext],
        data: {key: settings.dataNamePageNumber, value: settings.buttonOptionNext},
        text: onButtonTextRender.call(this, 'التالي', settings.onRenderDescNextPage),
        title: onButtonTitleRender.call(this, 'الصفحةالتالية', settings.onRenderDescNextPage),
    });
}
// Add the page number buttons
if (showPageNumberButtons) {
    let totalPages = getTotalPages(table);
    for (let index = 1; index <= totalPages; ++index) {
        attachButton({
            container: navigationButtons,
            classes: [settings.classNameButton, settings.classNameButtonPageNumber],
            data: {key: settings.dataNamePageNumber, value: index},
            text: onButtonTextRender.call(this, String(index), settings.onRenderDescPageNumber),
            title: onButtonTitleRender.call(this, 'الصفحة' + index, settings.onRenderDescPageNumber),
        });
    }
}
// Add the previous page button
if (showPreviousPageButton) {
    attachButton({
        container: navigationButtons,
        classes: [settings.classNameButton, settings.classNameButtonPrevious],
        data: {key: settings.dataNamePageNumber, value: settings.buttonOptionPrevious},
        text: onButtonTextRender.call(this, 'السابق', settings.onRenderDescPrevPage),
        title: onButtonTitleRender.call(this, 'الصفحة السابقة', settings.onRenderDescPrevPage),
    });
}
// Add the first page button
if (showFirstPageButton) {
    attachButton({
        container: navigationButtons,
        classes: [settings.classNameButton, settings.classNameButtonFirst],
        data: {key: settings.dataNamePageNumber, value: settings.buttonOptionFirst},
        text: onButtonTextRender.call(this, 'اﻷولى', settings.onRenderDescFirstPage),
        title: onButtonTitleRender.call(this, 'الصفحة اﻷولى', settings.onRenderDescFirstPage),
    });
}

// Add navigation input
if (showNavigationInput) {
    attachNavigationInput({
        table: table,
        pageOptions: pageOptions,
        container: navigationButtonSection,
        classes: [settings.classNameNavigationInputSection]
    });
}
