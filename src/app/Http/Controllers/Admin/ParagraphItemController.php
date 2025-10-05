<?php

namespace App\Http\Controllers\Admin;

use App\Enums\TableNameEnum;
use App\Http\Requests\Admin\StoreParagraphItemRequest;
use App\Http\Requests\Admin\UpdateParagpaphItemRequest;
use App\Models\ParagraphItem;
use DateTime;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ParagraphItemController
{
    /**
     *
     * @return View
     */
    public function index(): View
    {
        $title = 'Предметы в параграфах';
        $paragraphItems = DB::table(TableNameEnum::ParagraphItem->value)->orderBy('id')->paginate(10);
        return view('admin.paragraph_item.index', [
            'title' => $title,
            'paragraphItems' => $paragraphItems
        ]);
    }

    /**
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        $paragraphItem = DB::table(TableNameEnum::ParagraphItem->value)->find($id);
        $title = 'Предмет в параграфе №' . $paragraphItem->paragraph_number;
        return view('admin.paragraph_item.show', [
            'title' => $title,
            'paragraphItem' => $paragraphItem
        ]);
    }

    /**
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $paragraphItem = DB::table(TableNameEnum::ParagraphItem->value)->find($id);
        $title = 'Редактирование: Предмет в параграфе №' . $paragraphItem->paragraph_number;
        return view('admin.paragraph_item.edit', [
            'title' => $title,
            'paragraphItem' => $paragraphItem
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        $title = 'Создание: Предмет в параграфе';
        return view('admin.paragraph_item.create', [
            'title' => $title
        ]);
    }

    /**
     * @param StoreParagraphItemRequest $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(StoreParagraphItemRequest $request): RedirectResponse
    {
        $paragpaphItem = new ParagraphItem();
        $paragpaphItem->paragraph_number = (int)$request->paragraph_number;
        $paragpaphItem->item_id = (int)$request->item_id;
        $paragpaphItem->title = (string)$request->title;
        $paragpaphItem->created_at = new DateTime();
        $paragpaphItem->updated_at = new DateTime();

        if (!$paragpaphItem->save()) {
            throw new Exception();
        }
        return redirect()->route('paragraph_item.list')->with('success', 'Предмет успешно добавлен!');
    }

    /**
     * @param UpdateParagpaphItemRequest $request
     * @param int $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function update(UpdateParagpaphItemRequest $request, int $id): RedirectResponse
    {
        $paragraphItem = ParagraphItem::find($id);
        $paragraphItem->paragraph_number = (int)$request->paragraph_number;
        $paragraphItem->item_id = (int)$request->item_id;
        $paragraphItem->title = (string)$request->title;
        $paragraphItem->updated_at = new DateTime();
        if (!$paragraphItem->save()) {
            throw new Exception();
        }
        return redirect()->route('paragraph_item.list')->with('success', 'Предмет успешно обновлён');
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        DB::table(TableNameEnum::ParagraphItem->value)->delete($id);
        return redirect()->route('paragraph_item.list')->with('success', 'Предмет успешно удален!');
    }
}
