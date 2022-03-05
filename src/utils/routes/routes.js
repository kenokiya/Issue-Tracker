import {
  CreateIssue,
  Home,
  MyIssues,
  Notifications,
  TaggedIssue,
  ViewIssue,
} from "../../pages";

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
];
