{"version":3,"sources":["item.js"],"names":["BX","namespace","TileGrid","Item","options","this","id","isDraggable","isDroppable","name","type","layout","container","checkbox","gridTile","dblClickDelay","prototype","bindEvents","addCustomEvent","window","getId","render","clickTimer","preventClick","create","attrs","className","itemHeight","style","height","margin","getTileMargin","dataset","children","checkBoxing","getCheckBox","content","getContent","events","dblclick","event","clearTimeout","handleDblClick","call","resetSetMultiSelectMode","resetSelectAllItems","resetFromToItems","bind","click","setTimeout","handleClick","dragger","registerItem","registerDrop","isVisibleItem","rect","getBoundingClientRect","rectBody","document","body","top","bottom","afterRender","focusItem","resetFocusItem","grid","isKeyControlKey","setMultiSelectMode","checkItem","getFirstCurrentItem","isLastSelectedItem","isMultiSelectMode","unSelectItem","getCurrentItem","setFirstCurrentItem","isKeyPressedShift","selectFromToItems","isKeyPressedSelectAll","checked","selectItem","setCurrentItem","unCheckItem","selected","handleEnter","getContainer","props","stopPropagation","setAttribute","focus","removeAttribute","removeNode","withAnimation","itemContainer","parentNode","removeChild","classList","add","width","offsetWidth","animateNode","remove"],"mappings":"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","file":"item.map.js"}