import { Admin } from "../../AdminPages/Admin";
import {
  CreateIssue,
  Home,
  MyIssues,
  Notifications,
  TaggedIssue,
  ViewIssue,
} from "../../pages";
import { Login } from "../../pages/Login";

export const useRouter = () => [
  // myIssues
  {
    path: "/",
    element: <Home />,
  },
  {
    path: "/my_issues",
    element: <MyIssues />,
  },
  {
    path: "/my_issues/:id",
    element: <ViewIssue />,
  },
  {
    path: "/my_issues/create",
    element: <CreateIssue />,
  },

  {
    path: "/tagged",
    element: <TaggedIssue />,
  },

  {
    path: "/notifications",
    element: <Notifications />,
  },

  {
    path: "/login",
    element: <Login />,
  },

  // ADMIN ROUTES
  {
    path: "/admin/",
    element: <Admin />,
  },

  // ADMIN ROUTES END
];
