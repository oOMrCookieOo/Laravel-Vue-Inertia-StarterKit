type TBreadCrumb = {
    title: string;
    url: string;
    active: boolean;
}


export interface User {
    // columns
    id: number
    name: string
    email: string
    email_verified_at: string | null
    password?: string
    remember_token?: string | null
    created_at: string | null
    updated_at: string | null
    // relations
    roles?: Role[]
}

export interface Role {
    // columns
    id: number
    name: string
    guard_name: string
    created_at?: string | null
    updated_at?: string | null
    // relations
    permissions?: Permission[]
}

export interface Permission {
    // columns
    id: number
    name: string
    guard_name: string
    created_at?: string | null
    updated_at?: string | null
}


export type PageProps<T extends Record<string, unknown> = Record<string, unknown>> = T & {
    auth: {
        user: User;
    };
    breadcrumbs?: TBreadCrumb[];
};
