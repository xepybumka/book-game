<?php

namespace App\Http\Controllers\Admin;

use App\Enums\TableNameEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreItemRequest;
use App\Http\Requests\Admin\UpdateItemRequest;
use App\Models\Item;
use DateTime;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ItemController extends Controller
{
    /**
     *
     * @return View
     */
    public function index(): View
    {
        $title = 'Предметы';
        $items = Item::paginate(10);
        return view('admin.item.index', [
            'title' => $title,
            'items' => $items,
        ]);
    }

    /**
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        $title = 'Предмет №' . $id;
        $item = Item::find($id);
        return view('admin.item.show', [
            'title' => $title,
            'item'  => $item,
        ]);
    }

    /**
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $title = 'Редактирование: Предмет №' . $id;
        $item = Item::find($id);
        return view('admin.item.edit', [
            'title' => $title,
            'item'  => $item
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        $title = 'Создание: Предмет';
        return view('admin.item.create', [
            'title' => $title
        ]);
    }

    /**
     * @param StoreItemRequest $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(StoreItemRequest $request): RedirectResponse
    {
        $item = new Item();
        $item->name = (string)$request->name;
        $item->created_at = new DateTime();
        $item->updated_at = new DateTime();

        if (!$item->save()) {
            throw new Exception();
        }
        return redirect()->route('item.list')->with('success', 'Предмет ' . $item->name . ' успешно добавлен!');
    }

    /**
     * @param UpdateItemRequest $request
     * @param int $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function update(UpdateItemRequest $request, int $id)
    {
        $item = Item::find($id);
        $item->name = (string)$request->name;
        $item->updated_at = new DateTime();
        if (!$item->save()) {
            throw new Exception();
        }
        return redirect()->route('item.list')->with('success', 'Предмет ' . $item->name . ' успешно обновлен!');
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        Item::destroy($id);
        return redirect()->route('item.list')->with('success', 'Предмет успешно удален!');
    }
}
