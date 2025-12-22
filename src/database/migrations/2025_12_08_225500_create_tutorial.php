<?php

use App\Enums\TableNameEnum;
use App\Models\ParagpaphTransition;
use App\Models\Paragraph;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    private $paragraphs = [
        [
            'id' => 1000,
            'number' => 1000,
            'type' => \App\Enums\ParagraphTypeEnum::Html,
            'text' => '
                <p>
                Оригинальный текст обучения был изменен и адаптирован для этого приложения.
                <br>
                В виду технических особенностей в игре предостаточно возможностей сжульничать.
                Однако к чему тогда столько мучений — прочитайте последний параграф и играйте во что-то другое.
                Перед тем как отправиться в путешествие, необходимо определить, насколько вы сильный, выносливый,
                искусный и обаятельный воин, то есть установить изначальные ЛОВКОСТЬ, СИЛУ и ОБАЯНИЕ.
                </p>
            ',
        ],
        [
            'id' => 1001,
            'number' => 1001,
            'type' => \App\Enums\ParagraphTypeEnum::Html,
            'text' => '
                <p><strong>ЛОВКОСТЬ и СИЛА</strong></p>
                <p>ЛОВКОСТЬ — это умение владеть мечом, сражаться, противостоять врагам. Иногда это и обычная ловкость рук.
                Одним словом, ваши физические возможности. Естественно, чем больше ЛОВКОСТЬ, тем лучше, однако было бы наивно полагать,
                что все приключения рассчитаны только на здоровяков и сорвиголов. Не расстраивайтесь,
                если ваша изначальная ЛОВКОСТЬ будет не так высока, как хотелось бы,— есть немало других способов победить,
                не хватаясь каждые пять минут за оружие.<br>
                СИЛА — это прежде всего показатель вашего здоровья на данный момент.
                Она отражает не только наличие или отсутствие мускулов, но также и волю к жизни, решимости довести начатое дело до конца.
                Ведь и в действительности, когда говорят: сильный человек,— это не только про штангиста.
                Если показатель СИЛЫ становится равен нулю, вы погибнете, и придется начинать все сначала.</p>
            ',
        ],
        [
            'id' => 1002,
            'number' => 1002,
            'type' => \App\Enums\ParagraphTypeEnum::Html,
            'text' => '
                <p><strong>ОБАЯНИЕ</strong></p>
                <p>Нередко для того, чтобы куда-нибудь попасть, совсем не обязательно применять силу.
                Например, чтобы вас пропустили, вы можете попытаться уговорить, убедить собеседника,
                рассказывая правдивые или выдуманные истории. И здесь на помощь придет ОБАЯНИЕ.<br>
                Как проверить, насколько вы обаятельны? Киньте кубик два раза и сравните сумму выпавших на нем чисел
                с вашим ОБАЯНИЕМ на данный момент. Если результат меньше вашей ОБАЯНИЯ или равен ему — все в порядке.
                Если больше — номер не прошел и придется использовать другие средства.
                Какой параграф посмотреть в том или ином случае, обязательно будет сказано.<br>
                В случае успеха знайте, что ОБАЯНИЕ увеличилось на одну единицу, что окажется небесполезным в следующий раз.
                Если оно будет больше 12, в дальнейшем проверять его не имеет смысла.
                Вы чертовски обаятельны и можете смело этим пользоваться. Но верно и обратное.
                Если подстерегает неудача, ОБАЯНИЕ уменьшится также на одну единицу
                (что, разумеется, не может ему в следующий раз вновь повыситься).
                Однако если оно упало до 1, дальнейшее проверки опять же бессмысленны.
                Бывают люди настолько не внушающие доверия, что им никто не верит, даже если они говорят чистую правду.
                Отныне до конца игры вы становитесь именно таким человеком.</p>
            ',
        ],
        [
            'id' => 1003,
            'number' => 1003,
            'type' => \App\Enums\ParagraphTypeEnum::Html,
            'text' => '
                <p><strong>КАК ОПРЕДЕЛИТЬ ЛОВКОСТЬ, СИЛУ, ОБАЯНИЕ</strong></p>
                <p>Определив ЛОВКОСТЬ, СИЛУ и ОБАЯНИЕ, запишите их в Листок путешественника.
                Во время путешествия они будут меняться, поэтому лучше или с самого начала писать их помельче,
                или иметь под рукой ластик. Но ни в коем случае не стирайте тех значений ЛОВКОСТИ и СИЛЫ,
                с которыми отправились в путь,— за исключением специально оговоренных случаев их нельзя превышать.</p>
            ',
        ],
        [
            'id' => 1004,
            'number' => 1004,
            'type' => \App\Enums\ParagraphTypeEnum::Html,
            'text'   => '
                <div style="justify-content: center; align-items: center; min-height: 100vh; padding: 20px;">
                <table style="border-collapse: collapse; width: 100%; max-width: 600px; font-family: Arial, sans-serif;">
                    <thead>
                        <tr>
                            <th style="border: 1px solid #333; padding: 10px; text-align: center;  font-weight: bold;">На кубиках</th>
                            <th style="border: 1px solid #333; padding: 10px; text-align: center; font-weight: bold;">ЛОВКОСТЬ</th>
                            <th style="border: 1px solid #333; padding: 10px; text-align: center; font-weight: bold;">СИЛА</th>
                            <th style="border: 1px solid #333; padding: 10px; text-align: center; font-weight: bold;">ОБАЯНИЕ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>2</td><td>8</td><td>22</td><td>8</td></tr>
                        <tr><td>3</td><td>10</td><td>20</td><td>6</td></tr>
                        <tr><td>4</td><td>12</td><td>16</td><td>5</td></tr>
                        <tr><td>5</td><td>9</td><td>18</td><td>8</td></tr>
                        <tr><td>6</td><td>11</td><td>20</td><td>6</td></tr>
                        <tr><td>7</td><td>9</td><td>20</td><td>7</td></tr>
                        <tr><td>8</td><td>10</td><td>16</td><td>7</td></tr>
                        <tr><td>9</td><td>8</td><td>24</td><td>7</td></tr>
                        <tr><td>10</td><td>9</td><td>22</td><td>6</td></tr>
                        <tr><td>11</td><td>10</td><td>18</td><td>7</td></tr>
                        <tr><td>12</td><td>11</td><td>20</td><td>5</td></tr>
                    </tbody>
                </table>
            </div>
            '
        ],
    ];

    private $transitions = [
        [
            'id' => 1000,
            'paragraph_number' => 1000,
            'to_paragraph_number' => 1001,
            'title' => 'Дальше',
        ],
        [
            'id' => 1001,
            'paragraph_number' => 1001,
            'to_paragraph_number' => 1002,
            'title' => 'Дальше',
        ],
        [
            'id' => 1002,
            'paragraph_number' => 1002,
            'to_paragraph_number' => 1003,
            'title' => 'Дальше',
        ],
        [
            'id' => 1003,
            'paragraph_number' => 1003,
            'to_paragraph_number' => 1004,
            'title' => 'Дальше',
        ],
    ];


    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $paragraphTableName = TableNameEnum::Paragraph->value;
        $transitionTableName = TableNameEnum::ParagraphTransition->value;
        $paragraphs = $this->addDates($this->paragraphs);
        $transitions = $this->addDates($this->transitions);
        DB::table($paragraphTableName)->insert($paragraphs);
        DB::table($transitionTableName)->insert($transitions);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Paragraph::destroy(array_column($this->paragraphs,'id'));
       ParagpaphTransition::destroy(array_column($this->transitions,'id'));
    }

    private function addDates($items): array
    {
        return array_map(function ($item) {
            $item['created_at'] = new DateTime();
            $item['updated_at'] = new DateTime();
            return $item;
        },$items);
    }
};
