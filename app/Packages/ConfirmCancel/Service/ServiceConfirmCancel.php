<?php

namespace App\Packages\ConfirmCancel\Service;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

/**
 * Trait ServiceConfirmCancel предоставляет реализацию для сервисов с заимплемитированным интерфейсом IConfirmCancel.
 * Для его работы, необходимо предоставлять конкретный класс модели, у которой есть поле is_confirmed.
 * @package App\Packages\ConfirmCancel\Service
 */
trait ServiceConfirmCancel
{
    /**
     * Метод находит сущность по ID, устанавливает в поле is_confirmed ложное значение.
     * Возвращает результат в виде булева значения.
     *
     * @param int $id идентификатор записи из таблицы.
     * @return bool;
     * @throws \Exception
     */
    public function entityCancel(int $id): bool
    {
        $entity = $this->getModelWithConfirmed()::find($id);

        return $this->confirmCancel($entity);
    }

    /**
     * Метод находит сущность по ID, устанавливает в поле is_confirmed истинное значение.
     * Возвращает результат в виде булева значения.
     *
     * @param int $id идентификатор записи из таблицы.
     * @return bool;
     * @throws \Exception
     */
    public function entityConfirm(int $id): bool
    {
        $entity = $this->getModelWithConfirmed()::find($id);

        return $this->confirmCancel($entity);
    }


    /**
     * метод подтверждает запись, повторное использование отменяет подтверждение.
     * @throws \Exception
     */
    private function confirmCancel(Model $entity): bool
    {
        try {
            if (is_null($entity) || $entity->exists == false) {
                throw new \Exception('Сущность не найдена, либо её не существует');
            }

            if (!isset($entity->is_confirmed)) {
                throw new \Exception("У сущности отсутствует поле is_confirmed");
            }

            $entity->is_confirmed = !($entity->is_confirmed);
            return $entity->save();

        } catch (\Exception $e) {
            Log::channel('admin_entity_confirm')->error($e->getMessage() . ' - ' . $e->getFile());
            return false;
        }
    }

    /**
     * В реализации этого метода должен присутствовать возврат модели, у которой существует поле is_confirmed
     * Данный метод нужен для работы трейта, предоставляющего реализацию для сервиса с интерфейсом IConfirmCancel
     * @return Model
     */
    abstract protected function getModelWithConfirmed(): Model;
}
