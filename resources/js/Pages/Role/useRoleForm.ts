import { useForm } from "@inertiajs/vue3";
import { useArrayUnique } from "@vueuse/core";
import { useChangeCase } from '@vueuse/integrations/useChangeCase';

export function useRoleForm() {
    const form = useForm<{
        name: string,
        guard_name: string,
        permissions: string[]
    }>({
        name: '',
        guard_name: 'web',
        permissions: []
    });

    const sentenceCase = (str: string) => useChangeCase(str, 'sentenceCase').value;
    const lastWord = (str: string) => str.split('\\').pop();

    const isSelected = (permission: string, model: string) => {
        return form.permissions.includes(permissionName(permission, model))
    }

    const selectPermission = (permission: string, model: string) => {
        const permName = permissionName(permission, model);
        form.permissions.includes(permName)
            ? form.permissions = form.permissions.filter(p => p !== permName)
            : form.permissions.push(permName);
    }

    const _toggleAllPermissions = (values: boolean, props: { models: string[], permission_prefixes: string[] }) => {
        if (values) {
            props.models.map(_mode => {
                form.permissions.push(
                    ...props.permission_prefixes.map(permission => permissionName(permission, _mode))
                )
            })

            form.permissions = useArrayUnique(form.permissions).value;
        } else {
            form.permissions = [];
        }
    }

    const generatePermissions = (model: string, permissionPrefixes: string[]) => {
        return permissionPrefixes.map(permission => permissionName(permission, model))
    }

    const isAllModelPermissionsSelected = (model: string, permissionPrefixes: string[]) => {
        return generatePermissions(model, permissionPrefixes).every(permission => form.permissions.includes(permission));
    }

    const toggleModelPermissions = (model: string, permissionPrefixes: string[]) => {
        const generatedPermissions = generatePermissions(model, permissionPrefixes);
        if (isAllModelPermissionsSelected(model, permissionPrefixes)) {
            form.permissions = form.permissions.filter(permission => !generatedPermissions.includes(permission))
        } else {
            form.permissions.push(...generatedPermissions)
        }
    }


    const permissionName = (permission: string, model: string) => {

        return useChangeCase(`${permission}_${lastWord(model)}`, 'snakeCase').value;
    }

    return {
        form,
        sentenceCase,
        lastWord,
        isSelected,
        selectPermission,
        _toggleAllPermissions,
        generatePermissions,
        isAllModelPermissionsSelected,
        toggleModelPermissions,
        permissionName
    };
}
